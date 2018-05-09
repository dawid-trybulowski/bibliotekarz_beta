<?php
use Illuminate\Support\Facades\DB;

$borrowsTable =  Illuminate\Support\Facades\DB::class;
$borrowsNext = $borrowsTable::table('borrows');
$date = date('Y-m-d');

$borrows = $borrowsTable
    ->join('users', 'borrows.user_id', '=', 'users.id')
    ->join('books', 'borrows.book_id', '=', 'books.id')
    ->join('items', 'borrows.item_id', '=', 'items.id')
    ->select('borrows.*', 'books.title', 'books.author', 'users.first_name', 'users.second_name', 'users.surname', 'users.card_number', 'users.email')
    ->get();

foreach ($borrows as $borrow) {
    if ($borrow->borrow_stop < $date) {
        $delay = $borrow->delay + 1;
        $delay_cost = $borrow->delay_cost + 0.50;
        $this->borrows
            ->where('id', $borrow->id)
            ->update
            (
                [
                    'delay' => $delay,
                    'delay_cost' => $delay_cost
                ]
            );

        (Mail::send('delay-email', ['borrow' => $borrow], function ($message) use ($borrow) {
            $message->sender('biblioteka@biblioprojekt.hekko24.pl');
            $message->to($borrow->email, 'Dawid')->subject('Ponaglenie do zwrotu');
        }));
    }
}
