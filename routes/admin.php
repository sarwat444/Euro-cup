<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\{
    WinnerController,
    HomeController,
    VotesController,
    UsersController,
    advertismentsController
};

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.showLoginForm');
Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/admin-logout', [LoginController::class, 'loggedOut'])->name('admin.logout');

Route::group(['middleware' => 'auth:admin'],function () {
    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::group(['prefix' => 'advertisments', 'as' => 'advertisments.'] , function () {

        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [advertismentsController::class, 'create'])->name('index');
            Route::post('/', [advertismentsController::class, 'store'])->name('store');
        });

        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [advertismentsController::class, 'edit'])->name('index');
            Route::post('/{id}' , [advertismentsController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [advertismentsController::class, 'index'])->name('index');
            Route::get('/data'  , [advertismentsController::class, 'getDataTable'])->name('data');
        });

        Route::delete('/{id}'   , [advertismentsController::class, 'delete'])->name('delete');
        Route::post('/operation', [advertismentsController::class, 'operation'])->name('operation');
    });
    Route::group(['prefix' => 'winners', 'as' => 'winners.'] , function () {

        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [WinnerController::class, 'create'])->name('index');
            Route::post('/', [WinnerController::class, 'store'])->name('store');
        });

        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [WinnerController::class, 'edit'])->name('index');
            Route::post('/{id}' , [WinnerController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [WinnerController::class, 'index'])->name('index');
            Route::get('/data'  , [WinnerController::class, 'getDataTable'])->name('data');
        });

        Route::get('show/{id}'   , [WinnerController::class, 'show'])->name('show');

        Route::get('changeStatus/{id}'   , [WinnerController::class, 'changeStatus'])->name('changeStatus');
    });
    Route::group(['prefix' => 'users', 'as' => 'users.'] , function () {
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [UsersController::class, 'create'])->name('index');
            Route::post('/', [UsersController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [UsersController::class, 'edit'])->name('index');
            Route::post('/{id}' , [UsersController::class, 'update'])->name('update');
        });
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [UsersController::class, 'index'])->name('index');
            Route::get('/data'  , [UsersController::class, 'getDataTable'])->name('data');
        });
        Route::get('show/{id}'   , [UsersController::class, 'show'])->name('show');
    });
    Route::group(['prefix' => 'votes', 'as' => 'votes.'] , function () {
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [VotesController::class, 'create'])->name('index');
            Route::post('/', [VotesController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [VotesController::class, 'edit'])->name('index');
            Route::post('/{id}' , [VotesController::class, 'update'])->name('update');
        });
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [VotesController::class, 'index'])->name('index');
            Route::get('/data'  , [VotesController::class, 'getDataTable'])->name('data');
        });
        Route::get('show/{id}'   , [VotesController::class, 'show'])->name('show');
        Route::get('changeStatus/{id}'   , [VotesController::class, 'changeStatus'])->name('changeStatus');
        Route::delete('/{id}'   , [VotesController::class, 'destroy'])->name('delete');
    });

});

