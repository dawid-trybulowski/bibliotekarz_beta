<?php


namespace App\Http\Controllers\Admin;


use App\Http\Services\Admin\AdminCommuniqueService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminCommuniqueController
{
    /**
     * @var AdminCommuniqueService
     */
    private $adminCommuniqueService;

    public function __construct
    (
        AdminCommuniqueService $adminCommuniqueService
    )
    {

        $this->adminCommuniqueService = $adminCommuniqueService;
    }

    public function addCommunique(Request $request)
    {
        $text = $request->text;
        $userId = Auth::User()->id;
        $userName = Auth::User()->login;

        $message = $this->adminCommuniqueService->addCommunique($text, $userId, $userName);

        return Redirect::back()->with('message', $message);
    }
}