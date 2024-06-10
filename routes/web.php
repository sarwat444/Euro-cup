<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ {
    HomeController,
    AuthController,
    QuestionsController,
    CategoryController,
    SpecializesController,
    DoctorsController,
    BookAppointmentController,
    MedicalSuppliesController,
    OrdersController,
    AlternativeMedicineController,
    BlogsController ,
    VoteController
}
;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function () {

        Route::get( '/register', [ AuthController::class, 'register' ] )->name( 'register' );
        Route::get( '/login', [ AuthController::class, 'login' ] )->name( 'login' );
        Route::post( '/userLogin', [ AuthController::class, 'userLogin' ] )->name( 'userLogin' );
        Route::post( '/storeUser', [ AuthController::class, 'storeUser' ] )->name( 'storeUser' );
        Route::group(
            [
                'middleware' => [ 'userAuth' ]
            ], function () {
                Route::get( '/', [ HomeController::class, 'index' ] )->name( 'home' );
                Route::get( 'logout', [ AuthController::class, 'logout' ] )->name( 'logout' );
                Route::post('/send_vote' , [ VoteController::class, 'send_vote'])->name('send_vote');
                Route::post('/vote_statstics' , [ VoteController::class, 'vote_statstics'])->name('vote_statstics');


            }
        );
    }
);
