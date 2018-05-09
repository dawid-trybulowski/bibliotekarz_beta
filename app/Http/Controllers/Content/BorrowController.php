<?php

namespace App\Http\Controllers\Content;


use App\Http\Services\Content\BorrowsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BorrowController
{

    /**
     * @var BorrowsService
     */
    protected $borrowsService;

    public function __construct
    (
        BorrowsService $borrowsService
    )
    {
        $this->borrowsService = $borrowsService;
    }

    public function borrow(Request $request){
        $userId = Auth::User()->id;
        $bookId = (int)$request->bookId;
        $message = $this->borrowsService->borrow($bookId, $userId);

        return Redirect::back()->with('message', $message);
    }

    public function activeBorrowsByUser(){
        $userId = Auth::User()->id;

        return $this->borrowsService->getActiveBorrowsByUserId($userId);
    }

    public function extendBorrow(Request $request){
        $userId = Auth::User()->id;
        $borrowId = $request->borrowId;

        $message = $this->borrowsService->extendBorrow($borrowId, $userId);

        return Redirect::back()->with('message', $message);

    }
}