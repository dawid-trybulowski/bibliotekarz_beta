<?php

namespace App\Http\Controllers\Content;

use App\Http\Services\Content\WaitingListService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WaitingListController
{
    /**
     * @var WaitingListService
     */
    private $waitingListService;

    public function __construct
    (
        WaitingListService $waitingListService
    )
    {
        $this->waitingListService = $waitingListService;
    }

    public function addToWaitingList($bookId){
        $message = $this->waitingListService->addUserToWaitingList((int)$bookId, Auth::User()->id);

        return Redirect::back()->with('message', $message);
    }

    public function waitingListByUser(){
        $userId = Auth::User()->id;

        return $this->waitingListService->getWaitingListByUser($userId);
    }

    public function cancelWaitingListElement(Request $request){
        $userId = Auth::User()->id;
        $waitingListId = (int) $request->waitingListId;

        $message =  $this->waitingListService->cancelWaitingListElement($waitingListId, $userId);

        return Redirect::back()->with('message', $message);
    }
}