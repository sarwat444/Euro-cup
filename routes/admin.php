<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\{AlternativeMedicineController,
    AppointmentController,
    BlogController,
    CategoryController,
    ContactUsController,
    DoctorController,
    GeneralQuestionController,
    HomeController,
    OrderController,
    PatientController,
    QuestionController,
    specializesController};

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

    Route::group(['prefix' => 'specializes', 'as' => 'specializes.'] , function () {

        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [specializesController::class, 'create'])->name('index');
            Route::post('/', [specializesController::class, 'store'])->name('store');
        });

        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [specializesController::class, 'edit'])->name('index');
            Route::post('/{id}' , [specializesController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [specializesController::class, 'index'])->name('index');
            Route::get('/data'  , [specializesController::class, 'getDataTable'])->name('data');
        });

        Route::delete('/{id}'   , [specializesController::class, 'delete'])->name('delete');
        Route::post('/operation', [specializesController::class, 'operation'])->name('operation');
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

    Route::group(['prefix' => 'doctors', 'as' => 'doctors.'] , function () {

        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [DoctorController::class, 'create'])->name('index');
            Route::post('/', [DoctorController::class, 'store'])->name('store');
        });

        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [DoctorController::class, 'edit'])->name('index');
            Route::post('/{id}' , [DoctorController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [DoctorController::class, 'index'])->name('index');
            Route::get('/data'  , [DoctorController::class, 'getDataTable'])->name('data');
        });

        Route::get('show/{id}'   , [DoctorController::class, 'show'])->name('show');

        Route::get('changeStatus/{id}'   , [DoctorController::class, 'changeStatus'])->name('changeStatus');


//        Route::delete('/{id}'   , [AppointmentController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'patients', 'as' => 'patients.'] , function () {
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [PatientController::class, 'create'])->name('index');
            Route::post('/', [PatientController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [PatientController::class, 'edit'])->name('index');
            Route::post('/{id}' , [PatientController::class, 'update'])->name('update');
        });
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [PatientController::class, 'index'])->name('index');
            Route::get('/data'  , [PatientController::class, 'getDataTable'])->name('data');
        });
        Route::get('show/{id}'   , [PatientController::class, 'show'])->name('show');
//        Route::delete('/{id}'   , [AppointmentController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'orders', 'as' => 'orders.'] , function () {
        Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
            Route::get('/', [OrderController::class, 'create'])->name('index');
            Route::post('/', [OrderController::class, 'store'])->name('store');
        });
        Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
            Route::get('/{id}'  , [OrderController::class, 'edit'])->name('index');
            Route::post('/{id}' , [OrderController::class, 'update'])->name('update');
        });
        Route::group(['prefix' => 'all', 'as' => 'all.'], function () {
            Route::get('/'      , [OrderController::class, 'index'])->name('index');
            Route::get('/data'  , [OrderController::class, 'getDataTable'])->name('data');
        });
        Route::get('show/{id}'   , [OrderController::class, 'show'])->name('show');
        Route::get('changeStatus/{id}'   , [OrderController::class, 'changeStatus'])->name('changeStatus');
        Route::delete('/{id}'   , [OrderController::class, 'destroy'])->name('delete');
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

