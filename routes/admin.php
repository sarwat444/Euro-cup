<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\{AlternativeMedicineController,
    AppointmentController,
    BlogController,
    CategoryController,
    ContactUsController,
    WinnerController,
    GeneralQuestionController,
    HomeController,
    VotesController,
    UsersController,
    QuestionController,
    advertismentsController};

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.showLoginForm');
Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
Route::get('/admin-logout', [LoginController::class, 'loggedOut'])->name('admin.logout');

Route::group(['middleware' => 'auth:admin'],function () {

    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::group(['prefix' => 'categories', 'as' => 'categories.'] , function () {

        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [CategoryController::class, 'create'])->name('index');
            Route::post('/', [CategoryController::class, 'store'])->name('store');
        });

        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [CategoryController::class, 'edit'])->name('index');
            Route::post('/{id}' , [CategoryController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [CategoryController::class, 'index'])->name('index');
            Route::get('/data'  , [CategoryController::class, 'getDataTable'])->name('data');
        });

        Route::delete('/{id}'   , [CategoryController::class, 'delete'])->name('delete');
        Route::post('/operation', [CategoryController::class, 'operation'])->name('operation');
    });

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



    Route::group(['prefix' => 'appointments', 'as' => 'appointments.'] , function () {

        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [AppointmentController::class, 'create'])->name('index');
            Route::post('/', [AppointmentController::class, 'store'])->name('store');
        });

        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [AppointmentController::class, 'edit'])->name('index');
            Route::post('/{id}' , [AppointmentController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [AppointmentController::class, 'index'])->name('index');
            Route::get('/data'  , [AppointmentController::class, 'getDataTable'])->name('data');
        });

        Route::group(['prefix' => 'meeting', 'as' => 'meeting.'], function () {
            Route::post('/create' , [AppointmentController::class, 'createMeeting'])->name('create');
            Route::post('/'      , [AppointmentController::class, 'store'])->name('store');
            Route::get('/join/{url}' , [AppointmentController::class, 'joinMeeting'])->name('join_meeting');
        });
        Route::get('show/{id}'   , [AppointmentController::class, 'show'])->name('show');
        Route::get('changeStatus/{id}'   , [AppointmentController::class, 'changeStatus'])->name('changeStatus');
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

    Route::group(['prefix' => 'questions', 'as' => 'questions.'] , function () {
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [QuestionController::class, 'create'])->name('index');
            Route::post('/', [QuestionController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [QuestionController::class, 'edit'])->name('index');
            Route::post('/{id}' , [QuestionController::class, 'update'])->name('update');
        });
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [QuestionController::class, 'index'])->name('index');
            Route::get('/data'  , [QuestionController::class, 'getDataTable'])->name('data');
        });
        Route::delete('/{id}'   , [QuestionController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'general_questions', 'as' => 'general_questions.'] , function () {
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [GeneralQuestionController::class, 'create'])->name('index');
            Route::post('/', [GeneralQuestionController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [GeneralQuestionController::class, 'edit'])->name('index');
            Route::post('/{id}' , [GeneralQuestionController::class, 'update'])->name('update');
        });
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [GeneralQuestionController::class, 'index'])->name('index');
            Route::get('/data'  , [GeneralQuestionController::class, 'getDataTable'])->name('data');
        });
        Route::delete('/{id}'   , [GeneralQuestionController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'blogs', 'as' => 'blogs.'] , function () {
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [BlogController::class, 'create'])->name('index');
            Route::post('/', [BlogController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [BlogController::class, 'edit'])->name('index');
            Route::post('/{id}' , [BlogController::class, 'update'])->name('update');
        });
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [BlogController::class, 'index'])->name('index');
            Route::get('/data'  , [BlogController::class, 'getDataTable'])->name('data');
        });
        Route::delete('/{id}'   , [BlogController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'contact_us', 'as' => 'contact_us.'] , function () {
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [ContactUsController::class, 'index'])->name('index');
            Route::get('/data'  , [ContactUsController::class, 'getDataTable'])->name('data');
        });
    });

    Route::group(['prefix' => 'alternative_medicine', 'as' => 'alternative_medicine.'] , function () {

        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [AlternativeMedicineController::class, 'index'])->name('index');
            Route::get('/data'  , [AlternativeMedicineController::class, 'getDataTable'])->name('data');
        });
        Route::post('/operation', [AlternativeMedicineController::class, 'operation'])->name('operation');
    });

});

