<?php

namespace App\Http\Services\Admin;


use App\Http\Helpers\Message;
use App\Http\Services\Content\ItemService;
use App\Models\Book;
use App\Models\Borrows;
use App\Models\Items;
use App\Models\Reservations;
use Illuminate\Support\Facades\DB;

class AdminItemService extends ItemService
{
    /**
     * @var AdminBooksService
     */
    private $adminBooksService;
    /**
     * @var Book
     */
    private $books;
    /**
     * @var Reservations
     */
    private $reservations;
    /**
     * @var Borrows
     */
    private $borrows;

    public function __construct
    (
        Items $items,
        AdminBooksService $adminBooksService,
        Book $books,
        Reservations $reservations,
        Borrows $borrows
    )
    {
        parent::__construct($items);

        $this->adminBooksService = $adminBooksService;
        $this->books = $books;
        $this->reservations = $reservations;
        $this->borrows = $borrows;
    }

    public function getAllItems($request)
    {
        if ($request->searchBy) {
            return $this->items->searchByAndSortBy($request);
        }
        return $this->items->getAllItems();
    }

    public function editItem($request)
    {
        if ($request->active == 'on') {
            $active = true;
        } else {
            $active = false;
        }

        $result = $this->items->where('id', $request->id)->update
        (
            [
                'book_id' => (int)$request->bookId,
                'comment' => $request->comment,
                'location_code' => $request->locationCode,
                'status' => 1,
                'active' => $active,
                "created_at" => \Carbon\Carbon::now(), # \Datetime()
                "updated_at" => \Carbon\Carbon::now(),  # \Datetime()
            ]
        );

        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem.'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }

        return $message;
    }

    public function addItem($request)
    {
        if ($request->active == 'on') {
            $active = true;
        } else {
            $active = false;
        }
        DB::beginTransaction();
        $result = $this->items->where('id', $request->id)->insertGetId
        (
            [
                'book_id' => (int)$request->bookId,
                'comment' => $request->comment,
                'location_code' => $request->locationCode,
                'status' => 0,
                'active' => $active,
                "created_at" => \Carbon\Carbon::now(), # \Datetime()
                "updated_at" => \Carbon\Carbon::now(),  # \Datetime()
            ]
        );
        $itemAdded = $this->adminBooksService->addItemToBook((int)$request->bookId);

        if ($result && $itemAdded) {
            DB::commit();
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem') . '. Id nowego egzemplarza: ' . $result, 200, true);
        } else {
            DB::rollback();
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }

        return $message;
    }

    public function deleteItem($itemId)
    {
        $dependencies = $this->checkItemDependencies($itemId);
        foreach ($dependencies as $dependency) {
            if ($dependency['dependencies']) {
                $message = new Message(__('view.Błąd'), 'Nie możesz usunąć egzemplarza przypisanego do ' . $dependency['string'], 409, false);
                return $message;
            }
        }
        DB::beginTransaction();
        $result = $this->items->deleteItem($itemId);
        if($result)
        {
            $item = $this->items->getItemById($itemId);
            $book = $this->books->getBookById($item->book_id);
            if($item->status == 0 && $book->items == 1){
                $result = $this->books
                    ->where('id', $item->book_id)
                    ->update
                    (
                        [
                            'status' => 0,
                            'items' => 0
                        ]
                    );
            }elseif($item->status == 0 && $book->items > 1){

                $result = $this->books
                    ->decrement('items');
            }
        }
        if ($result) {
            DB::commit();
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            DB::rollback();
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    private function checkItemDependencies($itemId)
    {
        $dependencies = [];
        $reservations = $this->reservations
            ->where
            (
                'item_id', (int)$itemId
            )
            ->whereIn
            (
                'status', [1]
            )
            ->get();
        if (count($reservations)) {
            $dependencies['reservations'] =
                [
                    'string' => 'rezerwacji',
                    'ids' => [],
                    'dependencies' => true
                ];
            foreach ($reservations as $reservation) {
                array_push($dependencies['reservations']['ids'], $reservation->id);
            }
            return $dependencies;
        } else {
            $dependencies['reservations'] =
                [
                    'string' => 'rezerwacji',
                    'ids' => [],
                    'dependencies' => false
                ];
        }
        $borrows = $this->borrows
            ->where
            (
                'item_id', (int)$itemId
            )
            ->whereIn
            (
                'status', [1, 2]
            )
            ->get();
        if (count($borrows)) {
            $dependencies['borrows'] =
                [
                    'string' => 'wypożyczenia',
                    'ids' => [],
                    'dependencies' => true
                ];
            foreach ($borrows as $borrow) {
                array_push($dependencies['borrows']['ids'], $borrow->id);
            }
            return $dependencies;
        } else {
            $dependencies['borrows'] =
                [
                    'string' => 'wypożyczenia',
                    'ids' => [],
                    'dependencies' => false
                ];
        }
        return $dependencies;
    }

    private function changeIds($itemId, $action)
    {
        if ($action === 'reservations') {
            $reservations = $this->reservations
                ->where
                (
                    'item_id', (int)$itemId
                )
                ->get();
            $ids = [];
            foreach ($reservations as $reservation) {
                array_push($ids, $reservation->id);
            }
            if(!empty($ids)) {
                $this->reservations
                    ->where('item_id', (int)$itemId)
                    ->whereIn('id', $ids)
                    ->update
                    (
                        ['item_id' => 1]
                    );
            }
        }
        if ($action === 'borrows') {
            $borrows = $this->reservations
                ->where
                (
                    'item_id', (int)$itemId
                )
                ->get();
            $ids = [];
            foreach ($borrows as $borrow) {
                array_push($ids, $borrow->id);
            }
            if(!empty($ids)) {
                $this->borrows
                    ->where('item_id', (int)$itemId)
                    ->whereIn('id', $ids)
                    ->update
                    (
                        ['item_id' => 1]
                    );
            }
        }
    }
}