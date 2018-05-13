<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Content\ItemController;
use App\Http\Helpers\Message;
use App\Http\Services\Admin\AdminBooksService;
use App\Http\Services\Admin\AdminItemService;
use App\Http\Services\Content\ItemService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminItemController extends ItemController
{
    /**
     * @var ItemService
     */
    protected $itemService;
    /**
     * @var AdminItemService
     */
    private $adminItemService;
    /**
     * @var AdminBooksService
     */
    private $adminBooksService;
    /**
     * @var Items
     */
    private $items;

    public function __construct
    (
        ItemService $itemService,
        AdminItemService $adminItemService,
        AdminBooksService $adminBooksService,
        Config $configAll,
        ConfigService $configService,
        Items $items
    )
    {
        parent::__construct($itemService, $configAll, $configService);

        $this->itemService = $itemService;
        $this->adminItemService = $adminItemService;
        $this->adminBooksService = $adminBooksService;
        $this->items = $items;
    }

    public function editItemShow(Request $request)
    {
        $itemId = (int)$request->itemId;
        $item = $this->adminItemService->getItemById($itemId);
        $book = $this->adminBooksService->getBookById($item->book_id);
        $books = $this->adminBooksService->getBooksDataForItem();

        $compact =
            [
                'item' => $item,
                'book' => $book,
                'books' => $books,
                'config' => $this->config
            ];

        return view('admin/admin-item-edit', compact('compact'));
    }

    public function editItem(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'bookId' => 'required|integer',
            'comment' => 'string|nullable',
            'locationCode' => 'string|nullable',
            'active' => 'required|string',
        ]);
        $message = $this->adminItemService->editItem($request);

        return Redirect::back()->with('message', $message);
    }

    public function addItemShow()
    {
        $books = $this->adminBooksService->getBooksDataForItem();
        $compact =
            [
                'books' => $books,
                'config' => $this->config
            ];
        return view('admin/admin-item-add', compact('compact'));
    }

    public function addItem(Request $request)
    {
        $request->validate([
            'bookId' => 'required|integer',
            'comment' => 'string|nullable',
            'locationCode' => 'string|nullable',
            'active' => 'required|string',
        ]);
        $message = $this->adminItemService->addItem($request);

        return Redirect::back()->with('message', $message);
    }

    public function deleteItem(Request $request)
    {
        $request->validate([
            'itemId' => 'required|integer'
        ]);

        $message = $this->adminItemService->deleteItem($request->itemId);

        return Redirect::back()->with('message', $message);
    }
}