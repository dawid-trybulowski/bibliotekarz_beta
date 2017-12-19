<?php

namespace App\Http\Controllers;

use App\books;
use App\Responses\Reservations;
use App\Services\BooksServices\CreateReservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $reservationsController;

    protected $books;

    protected $reservations;

    public function __construct
    (
        ReservationsController $reservationsController,
        books $books,
        CreateReservations $createReservations
    )
    {
        $this->reservationsController = $reservationsController;
        $this->books = $books;
        $this->createReservations = $createReservations;
    }

    public function index()
    {
        $reservations = $this->reservationsController->getReservationsByUserId(Auth::user()->id);
        foreach ($reservations as $key => $value) {
            $book = $this->books
                ->get()
                ->where
                (
                    'id', (int)$value->book_id
                );
            $value->title = $book[$value->book_id - 1]->title;
            $value->author = $book[$value->book_id - 1]->author;
        }
        $updatedReservations = $this->createReservations->execute($reservations);

        return view('user-dashboard', compact('updatedReservations'));
    }
}
