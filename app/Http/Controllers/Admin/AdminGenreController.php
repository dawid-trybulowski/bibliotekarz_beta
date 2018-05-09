<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\AdminGenreService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminGenreController extends Controller
{
    /**
     * @var Config
     */
    private $configAll;
    /**
     * @var ConfigService
     */
    private $configService;
    /**
     * @var AdminCGenreService
     */
    private $adminGenreService;

    public function __construct
    (
        Config $configAll,
        ConfigService $configService,
        AdminGenreService $adminGenreService
    )
    {
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->adminGenreService = $adminGenreService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
    }

    public function editGenreShow(Request $request)
    {
        $genreId = (int) $request->genreId;

        $genre = $this->adminGenreService->getGenreById($genreId);

        $compact =
            [
                'genre' => $genre,
                'config' => $this->config
            ];
        return view('admin/admin-genre-edit', compact('compact'));
    }

    public function editGenre(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string'
        ]);

        $message = $this->adminGenreService->editGenre($request);

        return Redirect::back()->with('message', $message);
    }

    public function addGenreShow()
    {
        $compact =
            [
                'config' => $this->config
            ];
        return view('admin/admin-genre-add', compact('compact'));
    }

    public function addGenre(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $message = $this->adminGenreService->addGenre($request);

        return Redirect::back()->with('message', $message);
    }

    public function deleteGenre(Request $request){
        $request->validate([
            'genreId' => 'required|integer'
        ]);

        $message = $this->adminGenreService->deleteGenre($request->genreId);

        return Redirect::back()->with('message', $message);
    }
}