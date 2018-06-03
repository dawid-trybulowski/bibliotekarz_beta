<?php

namespace App\Http\Controllers\Content;

use App\Http\Helpers\Message;
use App\Http\Services\Content\CommentsAndRatesService;
use App\Http\Services\Content\BooksService;
use App\Http\Services\Content\ReservationsService;
use App\Http\Services\Shared\ConfigService;
use App\Mappers\BooksOrderByMapper;
use App\Mappers\BooksSearchMapper;
use App\Models\Categories;
use App\Models\Config;
use App\Models\Genres;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController
{
    protected $config;
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
     * @var BooksService
     */
    private $booksService;
    /**
     * @var CommentsAndRatesService
     */
    private $commentsAndRatesService;
    /**
     * @var Payments
     */
    private $payments;
    /**
     * @var Categories
     */
    private $categories;
    /**
     * @var Genres
     */
    private $genres;

    public function __construct(
        BookController $BooksController,
        Config $configAll,
        ConfigService $configService,
        ReservationsService $reservationsService,
        BooksService $booksService,
        CommentsAndRatesService $commentsAndRatesService,
        Payments $payments,
        Categories $categories,
        Genres $genres
    )
    {
        $this->BooksController = $BooksController;
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
        $this->reservationsService = $reservationsService;
        $this->booksService = $booksService;
        $this->commentsAndRatesService = $commentsAndRatesService;
        $this->payments = $payments;
        $this->categories = $categories;
        $this->genres = $genres;
    }

    function index(Request $request)
    {
        $books = $this->booksService->getAllBooks($request);
        $preparedBooks = $this->booksService->prepareBooks($books->paginate((int)$this->config['books_per_page']));
        $comments = $this->commentsAndRatesService->getComments();
        $categories = $this->categories->get();
        $genres = $this->genres->get();
        $searchMapper = new BooksSearchMapper();
        $searchMap = $searchMapper->map;
        $orderByMapper = new BooksOrderByMapper();
        $orderByMap = $orderByMapper->map;
        $compact =
            [
                'books' => $preparedBooks,
                'categories' => $categories,
                'genres' => $genres,
                'comments' => $comments,
                'searchMap' => $searchMap,
                'orderByMap' => $orderByMap,
                'config' => $this->config,
                'route' => 'index'
            ];
        if (isset($request->session_id) && filter_var($request->session_id, FILTER_SANITIZE_STRING)) {
            $payment = $this->payments->getPaymentDataBySessionId(filter_var($request->session_id, FILTER_SANITIZE_STRING));

            if ($payment) {
                if ($payment->status) {
                    $message = new Message('Płatność przez Przelewy24', 'Płatność przez Przelewy24 została potwierdzona. Dziękujemy za wpłatę.', 200, 1);
                } else {
                    $message = new Message('Płatność przez Przelewy24', 'Płatność przez Przelewy24 nie została potwierdzona. Platność może dotrzeć z opóźnieniem. O zaksiegowaniu wpłaty zostaniesz poinformowany w wiadomości email wysłanej z systemu Przelewy24', 200, 1);
                }
                $compact['message'] = $message;
            }else{
                $message = new Message('Płatność przez Przelewy24', 'Płatność nie powiodła się.', 200, 1);
            }
            $compact['message'] = $message;
           // return view('index', compact('compact'))->with('message', $message);
        }

        return view('index', compact('compact'));
    }

    function userDashboard()
    {
        $compact =
            [
                'config' => $this->config
            ];
        return view('user-dashboard', compact('compact'));
    }

    function userData()
    {
        $compact =
            [
                'config' => $this->config
            ];
        return view('user-data', compact('compact'));
    }

    public function userDataLoginEdit()
    {
        $compact =
            [
                'config' => $this->config
            ];
        return view('user-dashboard-login-edit', compact('compact'));
    }

    public function userDataPersonalEdit()
    {
        $compact =
            [
                'config' => $this->config
            ];
        return view('user-dashboard-personal-data-edit', compact('compact'));
    }

    public function userDashboardReservationsHistory()
    {
        $userId = Auth::User()->id;

        $reservations = $this->reservationsService->getReservationsByUserId($userId);

        $compact =
            [
                'reservations' => $reservations,
                'config' => $this->config
            ];
        return view('user-dashboard-reservations-history', compact('compact'));
    }

    public function showContactForm()
    {
        $compact =
            [
                'config' => $this->config
            ];

        return view('contact-form', compact('compact'));
    }

    public function showRegulations(){
        $compact =
            [
                'config' => $this->config
            ];

        return view('regulations', compact('compact'));
    }

    public function showPrivacyPolicy(){
        $compact =
            [
                'config' => $this->config
            ];

        return view('privacy-policy', compact('compact'));
    }
}