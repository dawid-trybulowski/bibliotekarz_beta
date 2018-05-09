<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Content\BorrowController;
use App\Http\Services\Admin\AdminBorrowsService;
use App\Http\Services\Content\BorrowsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminBorrowController extends BorrowController
{
    /**
     * @var AdminBorrowsService
     */
    private $adminBorrowsService;

    public function __construct(BorrowsService $borrowsService, AdminBorrowsService $adminBorrowsService)
    {
        parent::__construct($borrowsService);
        $this->adminBorrowsService = $adminBorrowsService;
    }

    public function endBorrow(Request $request)
    {
        $borrowId = (int) $request->borrowId;
        $userId = (int) $request->userId;

        $message = $this->adminBorrowsService->endBorrow($borrowId, $userId);

        return Redirect::back()->with('message', $message);
    }

    public function borrowForUser(Request $request)
    {
        $userId = (int) $request->userId;
        $bookId = (int) $request->bookId;
        $reservationId = 0;

        $message = $this->adminBorrowsService->borrowForUser($bookId, $userId, $reservationId);

        return Redirect::back()->with('message', $message);
    }

    public function delayBorrowsAction()
    {
        $this->adminBorrowsService->delayBorrowsAction();
    }
}