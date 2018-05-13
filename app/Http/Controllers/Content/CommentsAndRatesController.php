<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Services\Content\CommentsAndRatesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentsAndRatesController extends Controller
{
    /**
     * @var CommentsAndRatesService
     */
    private $commentsAndRatesService;

    public function __construct
    (
        CommentsAndRatesService $commentsAndRatesService
    )
    {
        $this->commentsAndRatesService = $commentsAndRatesService;
    }

    public function AddCommentAndRate(Request $request)
    {
        if (!empty($request->rate) || !empty($request->comment)) {
            $message = $this->commentsAndRatesService->addCommentAndRate($request->comment ? $request->comment : '', $request->rate ? $request->rate : null, $request->bookId, Auth::User()->id);
            return Redirect::back()->with('message', $message);
        } else {
            return Redirect::back();
        }
    }
}