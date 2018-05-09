<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\App;

App::setLocale('pl');
Route::group(['namespace' => 'Content', ], function () {
    Route::get('', 'MainController@index')
        ->name('index');

    Route::post('przelewy24PaymentTrnVerify', 'PaymentController@przelewy24PaymentTrnVerify')
        ->name('przelewy24PaymentTrnVerify');
    Route::get('book/{bookId}', 'BookController@showBookPage')
        ->name('show-book-page');
    Route::get('contact', 'MainController@showContactForm')
        ->name('show-contact-form');
    Route::post('send-from-contact-form', 'EmailController@sendFromContactForm')
        ->name('send-from-contact-form');
    Route::view('email', 'email')
        ->name('email');
    Route::get('search', 'MainController@search')
        ->name('search');
});

Route::get('admin/delay-borrows-action', 'admin\AdminBorrowController@delayBorrowsAction')
    ->name('delay-borrows-action');
Route::get('admin/delay-reservations-action', 'admin\AdminReservationController@delayReservationsAction')
    ->name('delay-reservations-action');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')
    ->name('password.reset');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')
    ->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')
    ->name('password.email');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::group(['namespace' => 'Content', 'middleware' => 'auth'], function () {
    Route::get('dashboard', 'MainController@userDashboard')
        ->name('dashboard');
    Route::get('user-data', 'MainController@userData')
        ->name('user-data');
    Route::get('user-data-login-edit', 'MainController@userDataLoginEdit')
        ->name('user-data-login-edit');
    Route::post('user-data-login-edit-api', 'UserController@userDataLoginEdit')
        ->name('user-data-login-edit-api');
    Route::get('user-data-personal-edit', 'MainController@userDataPersonalEdit')
        ->name('user-data-personal-edit');
    Route::post('user-data-personal-edit-api', 'UserController@userDataPersonalEdit')
        ->name('user-data-personal-edit-api');
    Route::get('user-dashboard-reservations-history', 'UserDashboardController@userDashboardReservationsHistory')
        ->name('user-dashboard-reservations-history');
    Route::get('user-dashboard-borrows-history', 'UserDashboardController@userDashboardBorrowsHistory')
        ->name('user-dashboard-borrows-history');
    Route::get('user-dashboard-payments', 'UserDashboardController@userDashboardPayments')
        ->name('user-dashboard-payments');
    Route::get('reserve/{bookId}', 'ReservationController@reserve')
        ->name('reserve');
    Route::get('borrow/{bookId}', 'BorrowController@borrow')
        ->name('borrow');
    Route::get('addToWaitingList/{bookId}', 'WaitingListController@addToWaitingList')
        ->name('addToWaitingList');
    Route::get('logout', 'UserController@logout')
        ->name('logout');
    Route::post('addCommentAndRate', 'CommentsAndRatesController@addCommentAndRate')
        ->name('addCommentAndRate');
    Route::post('activeReservationsByUser', 'ReservationController@activeReservationsByUser')
        ->name('activeReservationsByUser');
    Route::post('activeBorrowsByUser', 'BorrowController@activeBorrowsByUser')
        ->name('activeBorrowsByUser');
    Route::get('cancelReservation/{reservationId}', 'ReservationController@cancelReservation')
        ->name('cancelReservation');
    Route::get('extendBorrow/{borrowId}', 'BorrowController@extendBorrow')
        ->name('extendBorrow');
    Route::post('waitingListByUser', 'WaitingListController@waitingListByUser')
        ->name('waitingListByUser');
    Route::get('cancelWaitingListElement/{waitingListId}', 'WaitingListController@cancelWaitingListElement')
        ->name('cancelWaitingListElement');
    Route::post('przelewy24Payment', 'PaymentController@przelewy24Payment')
        ->name('przelewy24Payment');
});


Route::group(['namespace' => 'Admin', 'middleware' => 'worker'], function () {
    Route::get('admin', 'MainController@index')
        ->name('admin-index');
    Route::get('admin/reservations', 'MainController@reservations')
        ->name('admin-reservations');
    Route::get('admin/borrows', 'MainController@borrows')
        ->name('admin-borrows');
    Route::get('admin/books', 'MainController@books')
        ->name('admin-books');
    Route::get('admin/items', 'MainController@items')
        ->name('admin-items');
    Route::get('admin/genres', 'MainController@genres')
        ->name('admin-genres');
    Route::get('admin/categories', 'MainController@categories')
        ->name('admin-categories');
    Route::get('admin/age-categories', 'MainController@ageCategories')
        ->name('admin-age-categories');
    Route::get('admin/users', 'MainController@users')
        ->name('admin-users');
    Route::get('admin/permitted-users', 'MainController@permittedUsers')
        ->name('admin-permitted-users');
    Route::get('admin/payments', 'MainController@payments')
        ->name('admin-payments');
    Route::get('admin/reservation-cancel', 'AdminReservationController@cancelReservation')
        ->name('admin-reservation-cancel');
    Route::get('admin/reservation-confirm', 'AdminReservationController@confirmReservation')
        ->name('admin-reservation-confirm');
    Route::get('admin/borrow-end', 'AdminBorrowController@endBorrow')
        ->name('admin-borrow-end');
    Route::get('admin/user-close-account', 'AdminUserController@closeAccount')
        ->name('user-close-account');
    Route::get('admin/user-open-account', 'AdminUserController@OpenAccount')
        ->name('user-open-account');
    Route::get('admin/admin-book-edit', 'AdminBookController@editBookShow')
        ->name('admin-book-edit-show');
    Route::post('admin/admin-book-edit', 'AdminBookController@editBook')
        ->name('admin-book-edit');
    Route::get('admin/admin-book-add', 'AdminBookController@addBookShow')
        ->name('admin-book-add-show');
    Route::post('admin/admin-book-add', 'AdminBookController@addBook')
        ->name('admin-book-add');
    Route::get('admin/admin-item-edit', 'AdminItemController@editItemShow')
        ->name('admin-item-edit-show');
    Route::post('admin/admin-item-edit', 'AdminItemController@editItem')
        ->name('admin-item-edit');
    Route::get('admin/admin-item-add', 'AdminItemController@addItemShow')
        ->name('admin-item-add-show');
    Route::post('admin/admin-item-add', 'AdminItemController@addItem')
        ->name('admin-item-add');
    Route::get('admin/admin-item-delete', 'AdminItemController@deleteItem')
        ->name('admin-item-delete');
    Route::get('admin/admin-category-edit', 'AdminCategoryController@editCategoryShow')
        ->name('admin-category-edit-show');
    Route::post('admin/admin-category-edit', 'AdminCategoryController@editCategory')
        ->name('admin-category-edit');
    Route::get('admin/admin-category-add', 'AdminCategoryController@addCategoryShow')
        ->name('admin-category-add-show');
    Route::post('admin/admin-category-add', 'AdminCategoryController@addCategory')
        ->name('admin-category-add');
    Route::get('admin/admin-category-delete', 'AdminCategoryController@deleteCategory')
        ->name('admin-category-delete');
    Route::get('admin/admin-genre-edit', 'AdminGenreController@editGenreShow')
        ->name('admin-genre-edit-show');
    Route::post('admin/admin-genre-edit', 'AdminGenreController@editGenre')
        ->name('admin-genre-edit');
    Route::get('admin/admin-genre-add', 'AdminGenreController@addGenreShow')
        ->name('admin-genre-add-show');
    Route::post('admin/admin-genre-add', 'AdminGenreController@addGenre')
        ->name('admin-genre-add');
    Route::get('admin/admin-genre-delete', 'AdminGenreController@deleteGenre')
        ->name('admin-genre-delete');
    Route::get('admin/admin-age-category-edit', 'AdminAgeCategoryController@editAgeCategoryShow')
        ->name('admin-age-category-edit-show');
    Route::post('admin/admin-age-category-edit', 'AdminAgeCategoryController@editAgeCategory')
        ->name('admin-age-category-edit');
    Route::get('admin/admin-age-category-add', 'AdminAgeCategoryController@addAgeCategoryShow')
        ->name('admin-age-category-add-show');
    Route::post('admin/admin-age-category-add', 'AdminAgeCategoryController@addAgeCategory')
        ->name('admin-age-category-add');
    Route::get('admin/admin-age-category-delete', 'AdminAgeCategoryController@deleteAgeCategory')
        ->name('admin-age-category-delete');
    Route::get('admin/admin-user-edit', 'AdminUserController@editUserShow')
        ->name('admin-user-edit-show');
    Route::post('admin/admin-user-edit', 'AdminUserController@editUser')
        ->name('admin-user-edit');
    Route::get('admin/admin-permitted-user-edit', 'AdminUserController@editPermittedUserShow')
        ->name('admin-permitted-user-edit-show');
    Route::post('admin/admin-permitted-user-edit', 'AdminUserController@editPermittedUser')
        ->name('admin-permitted-user-edit');
    Route::get('admin/admin-permitted-user-add', 'AdminUserController@addPermittedUserShow')
        ->name('admin-permitted-user-add-show');
    Route::post('admin/admin-permitted-user-add', 'AdminUserController@addPermittedUser')
        ->name('admin-permitted-user-add');
    Route::get('admin/books-search/{searchBy?}/{text?}/{orderBy?}/{orderDestination?}/{action?}', 'AdminBookController@searchByAndSortBy')
        ->name('admin-books-search');
    Route::get('admin/items/{searchBy}/{text}/{orderBy}/{orderDestination}/{action}', 'AdminItemController@searchByAndSortBy')
        ->name('admin-items-search');
    Route::post('admin/add-communique', 'AdminCommuniqueController@addCommunique')
        ->name('admin-add-communique');
    Route::post('admin/borrow-for-user', 'AdminBorrowController@borrowForUser')
        ->name('borrow-for-user');
    Route::get('admin/set-payment-status', 'AdminPaymentController@setPaymentStatus')
        ->name('set-payment-status');
});

Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function () {
    Route::get('admin/settings-general', 'MainController@settingsGeneral')
        ->name('settings-general');
    Route::get('admin/settings-view', 'MainController@settingsView')
        ->name('settings-view');
    Route::get('admin/settings-email', 'MainController@settingsEmail')
        ->name('settings-email');
    Route::get('admin/settings-payments', 'MainController@settingsPayments')
        ->name('settings-payments');
    Route::get('admin/settings-database', 'MainController@settingsDatabase')
        ->name('settings-database');
    Route::post('admin/config-update', 'AdminConfigController@updateGeneralSettings')
        ->name('admin-config-update');
    Route::post('admin/view-config-update', 'AdminConfigController@updateViewSettings')
        ->name('admin-view-config-update');
    Route::post('admin/payments-config-update', 'AdminConfigController@updatePaymentsSettings')
        ->name('admin-payments-config-update');
});

Route::get('author/{author}', 'BookController@getBooksByAuthor')->name('search-author');
Route::get('genre/{genre}', 'BookController@getBooksByGenre')->name('search-genre');
Route::post('search', 'BookController@search')->name('search');
Route::get('user/login-edit', 'UserController@loginEditView')->name('login-edit');
Route::post('user/login-set', 'UserController@changeLoginData')->name('login-set');
Route::get('user/data-edit', 'UserController@dataEditView')->name('data-edit');
Route::get('contact-form', 'UserController@showContactForm')->name('contact-form');
Route::get('check-delay', 'BorrowsController@checkDelay')->name('check-delay');
Route::post('send-email', 'UserController@sendEmail')->name('send-email');
Route::post('user/data-set', 'UserController@changeAccountData')->name('data-set');
Route::post('comment-add', 'CommentsController@addComment')->name('comment-add');
Route::post('waiting-list-add', 'WaitingListsController@addToWaitingList')->name('waiting-list-add');
Route::post('borrow-lengthen', 'BorrowsController@borrowLengthen')->name('borrow-lengthen');
Route::post('reservation-cancel', 'ReservationsController@reservationCancel')->name('reservation-cancel');
Route::post('admin/books-edit', 'BookController@adminBooksEdit')->name('admin-books-edit');
Route::get('admin/books-edit-show/{bookId}', 'BookController@adminBooksEditShow')->name('admin-books-edit-show');
Route::get('admin/books-delete/{bookId}', 'BookController@adminBooksDelete')->name('admin-books-delete');
Route::get('admin/books-add-show', 'BookController@adminBooksAddShow')->name('admin-books-add-show');
Route::post('admin/books-add', 'BookController@adminBooksAdd')->name('admin-books-add');
Route::get('admin/users-search', 'UserController@adminUsersSearch')->name('admin-users-search');
Route::get('admin/users-edit-show/{userId}', 'UserController@adminUsersEditShow')->name('admin-users-edit-show');
Route::post('admin/users-edit', 'UserController@adminUsersEdit')->name('admin-users-edit');
Route::get('admin/users-open/{userId}', 'UserController@adminUsersOpen')->name('admin-users-open');

Route::get('admin/reservations-search', 'ReservationsController@adminReservationsSearch')->name('admin-reservations-search');
Route::get('admin/borrows-search', 'BorrowsController@adminBorrowsSearch')->name('admin-borrows-search');
Route::get('admin/borrows-end/{bookId}/{itemId}/{borrowId}', 'BorrowsController@adminBorrowsEnd')->name('admin-borrows-end');
Route::get('admin/items-edit-show/{itemId}', 'ItemsController@adminItemsEditShow')->name('admin-items-edit-show');
Route::post('admin/items-edit', 'ItemsController@adminItemsEdit')->name('admin-items-edit');
Route::get('admin/items-delete/{itemId}', 'ItemsController@adminItemsDelete')->name('admin-items-delete');
Route::get('admin/items-add-show', 'ItemsController@adminItemsAddShow')->name('admin-items-add-show');
Route::post('admin/items-add', 'ItemsController@adminItemsAdd')->name('admin-items-add');

Route::get('admin/genres-search', 'GenresController@adminGenresSearch')->name('admin-genres-search');
Route::post('admin/genres-edit', 'GenresController@adminGenresEdit')->name('admin-genres-edit');
Route::get('admin/genres-edit-show/{genreId}', 'GenresController@adminGenresEditShow')->name('admin-genres-edit-show');
Route::post('admin/genres-add', 'GenresController@adminGenresAdd')->name('admin-genres-add');
Route::view('admin/genres-add-show', 'admin/genres-add')->name('admin-genres-add-show');
Route::get('admin/genres-delete/{genreId}', 'GenresController@adminGenresDelete')->name('admin-genres-delete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
