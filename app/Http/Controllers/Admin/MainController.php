<?php

namespace App\Http\Controllers\Admin;


use App\Http\Services\Admin\AdminAgeCategoryService;
use App\Http\Services\Admin\AdminBooksService;
use App\Http\Services\Admin\AdminBorrowsService;
use App\Http\Services\Admin\AdminCategoryService;
use App\Http\Services\Admin\AdminCommuniqueService;
use App\Http\Services\Admin\AdminGenreService;
use App\Http\Services\Admin\AdminItemService;
use App\Http\Services\Admin\AdminLocationService;
use App\Http\Services\Admin\AdminPaymentService;
use App\Http\Services\Admin\AdminReservationsService;
use App\Http\Services\Admin\AdminUserService;
use App\Http\Services\Admin\StatisticsService;
use App\Http\Services\Content\ReservationsService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Config;
use App\Models\User;
use Illuminate\Http\Request;

class MainController
{

    /**
     * @var StatisticsService
     */
    private $statisticsService;
    /**
     * @var Config
     */
    private $configAll;
    /**
     * @var ConfigService
     */
    private $configService;
    /**
     * @var ReservationsService
     */
    private $reservationsService;
    /**
     * @var AdminBorrowsService
     */
    private $borrowsService;
    /**
     * @var AdminBooksService
     */
    private $booksService;
    /**
     * @var AdminItemService
     */
    private $itemsService;
    /**
     * @var AdminGenreService
     */
    private $genresService;
    /**
     * @var AdminCategoryService
     */
    private $categoriesService;
    /**
     * @var AdminAgeCategoryService
     */
    private $ageCategoriesService;
    /**
     * @var AdminUserService
     */
    private $userService;
    /**
     * @var AdminCommuniqueService
     */
    private $adminCommuniqueService;
    /**
     * @var User
     */
    private $user;
    /**
     * @var AdminPaymentService
     */
    private $adminPaymentService;
    /**
     * @var AdminUserService
     */
    private $adminUserService;
    /**
     * @var AdminLocationService
     */
    private $adminLocationService;

    /**
     * MainController constructor.
     * @param Config $configAll
     * @param ConfigService $configService
     * @param StatisticsService $statisticsService
     * @param AdminReservationsService $reservationsService
     * @param AdminBorrowsService $borrowsService
     * @param AdminBooksService $booksService
     * @param AdminItemService $itemsService
     */
    public function __construct
    (
        Config $configAll,
        ConfigService $configService,
        StatisticsService $statisticsService,
        AdminReservationsService $reservationsService,
        AdminBorrowsService $borrowsService,
        AdminBooksService $booksService,
        AdminItemService $itemsService,
        AdminGenreService $genresService,
        AdminCategoryService $categoriesService,
        AdminAgeCategoryService $ageCategoriesService,
        AdminUserService $userService,
        AdminCommuniqueService $adminCommuniqueService,
        User $user,
        AdminPaymentService $adminPaymentService,
        AdminUserService $adminUserService,
        AdminLocationService $adminLocationService
    )
    {
        $this->statisticsService = $statisticsService;
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
        $this->reservationsService = $reservationsService;
        $this->borrowsService = $borrowsService;
        $this->booksService = $booksService;
        $this->itemsService = $itemsService;
        $this->genresService = $genresService;
        $this->categoriesService = $categoriesService;
        $this->ageCategoriesService = $ageCategoriesService;
        $this->userService = $userService;
        $this->adminCommuniqueService = $adminCommuniqueService;
        $this->user = $user;
        $this->adminPaymentService = $adminPaymentService;
        $this->adminUserService = $adminUserService;
        $this->adminLocationService = $adminLocationService;
    }

    public function index(Request $request)
    {
        $statistics = $this->statisticsService->getStatistics();
        $communiques = $this->adminCommuniqueService->getAllCommuniques();

        $compact =
            [
                'statistics' => $statistics,
                'communiques' => $communiques,
                'config' => $this->config
            ];

        return view('admin/index', compact('compact'));
    }

    public function reservations(Request $request)
    {
        $reservations = $this->reservationsService->getAllReservations($request);

        $compact =
            [
                'reservations' => $reservations,
                'config' => $this->config
            ];

        return view('admin/reservations', compact('compact'));
    }

    public function borrows(Request $request)
    {
        $borrows = $this->borrowsService->getAllBorrows($request);
        $compact =
            [
                'borrows' => $borrows,
                'config' => $this->config
            ];

        return view('admin/borrows', compact('compact'));
    }

    public function books(Request $request)
    {
        $books = $this->booksService->getAllBooks($request);
        $preparedBooks = $this->booksService->prepareBooks($books->paginate());
        $users = $this->user->get();
        $request->searchBy = '';
        $locations = $this->adminLocationService->getAllLocations($request);

        $compact =
            [
                'users' => $users,
                'books' => $preparedBooks,
                'config' => $this->config,
                'locations' => $locations
            ];

        return view('admin/books', compact('compact'));
    }

    public function items(Request $request)
    {
        $items = $this->itemsService->getAllItems($request);

        $compact =
            [
                'items' => $items,
                'config' => $this->config
            ];

        return view('admin/items', compact('compact'));
    }

    public function genres(Request $request)
    {
        $genres = $this->genresService->getAllGenres($request);
        $compact =
            [
                'genres' => $genres,
                'config' => $this->config
            ];

        return view('admin/genres', compact('compact'));
    }

    public function categories(Request $request)
    {
        $categories = $this->categoriesService->getAllCategories($request);

        $compact =
            [
                'categories' => $categories,
                'config' => $this->config
            ];

        return view('admin/categories', compact('compact'));
    }

    public function ageCategories(Request $request)
    {
        $ageCategories = $this->ageCategoriesService->getAllAgeCategories($request);

        $compact =
            [
                'ageCategories' => $ageCategories,
                'config' => $this->config
            ];

        return view('admin/age-categories', compact('compact'));
    }

    public function Users(Request $request)
    {
        $users = $this->userService->getAllUsers($request);

        $compact =
            [
                'users' => $users,
                'config' => $this->config
            ];

        return view('admin/users', compact('compact'));
    }

    public function payments(Request $request)
    {
        $payments = $this->adminPaymentService->getAllPayments($request);

        $compact =
            [
                'payments' => $payments,
                'config' => $this->config
            ];

        return view('admin/users-payments', compact('compact'));
    }

    public function locations(Request $request)
    {
        $locations = $this->adminLocationService->getAllLocations($request);

        $compact =
            [
                'locations' => $locations,
                'config' => $this->config
            ];

        return view('admin/locations', compact('compact'));
    }

    public function settingsGeneral()
    {
        $compact =
            [
                'config' => $this->config
            ];

        return view('admin/settings-general', compact('compact'));
    }

    public function settingsView()
    {
        $compact =
            [
                'config' => $this->config
            ];

        return view('admin/settings-view', compact('compact'));
    }

    public function settingsEmail()
    {
        $compact =
            [
                'config' => $this->config
            ];

        return view('admin/settings-email', compact('compact'));
    }

    public function settingsPayments()
    {
        $compact =
            [
                'config' => $this->config
            ];

        return view('admin/settings-payments', compact('compact'));
    }

    public function permittedUsers(Request $request)
    {
        $permittedUsers = $this->adminUserService->getAllPermittedUsers($request);

        $compact =
            [
                'permittedUsers' => $permittedUsers,
                'config' => $this->config
            ];

        return view('admin/permitted-users', compact('compact'));
    }
}