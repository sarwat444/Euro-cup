<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\{
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
    BlogsController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/userLogin', [AuthController::class, 'userLogin'])->name('userLogin');
    Route::post('/storeUser', [AuthController::class, 'storeUser'])->name('storeUser');
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('about', [HomeController::class, 'about'])->name('about');
    Route::get('services', [HomeController::class, 'services'])->name('services');
    Route::get('privacy_policy', [HomeController::class, 'privacy_policy'])->name('privacy_policy');
    Route::get('Terms_of_Service', [HomeController::class, 'Terms_of_Service'])->name('Terms_of_Service');
    Route::get('appointment_steps', [HomeController::class, 'appointment_steps'])->name('appointment_steps');
    Route::get('doctors', [DoctorsController::class, 'doctors'])->name('doctors');


    Route::group(
        [
            'middleware' => ['userAuth']
        ], function () {
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::resource('questions', QuestionsController::class);
        Route::get('all_questions', [QuestionsController::class, 'all_questions'])->name('all_questions');

        Route::get('create_public_function', [QuestionsController::class, 'create_public_function'])->name('create_public_function');
        Route::get('blog_question_create', [QuestionsController::class, 'blog_question_create'])->name('blog_question_create');

        Route::get('questionCategory/{id}', [CategoryController::class, 'questionCategory'])->name('questionCategory');
        Route::get("edit_profile/{id}", [AuthController::class, 'edit_profile'])->name('edit_profile');
        Route::post('updateUser', [AuthController::class, 'updateUser'])->name('updateUser');
        Route::get('specializes', [SpecializesController::class, 'index'])->name('specializes');
        Route::get('specializes_doctors/{id}', [SpecializesController::class, 'specializes_doctors'])->name('specializes_doctors');
        Route::get('doctor_details/{id}', [DoctorsController::class, 'doctor_details'])->name('doctor_details');

        Route::get('Book_Appointment/{doctor_id}', [BookAppointmentController::class, 'Book_Appointment'])->name('Book_Appointment');
        Route::post('Book_Appointment/{doctor_id}', [BookAppointmentController::class, 'Book_Appointment'])->name('Book_Appointment');

        Route::post('save_appointment', [BookAppointmentController::class, 'save_appointment'])->name('save_appointment');
        Route::get('createMedicalSupplies', [MedicalSuppliesController::class, 'create'])->name('createMedicalSupplies');
        Route::post('storeMedicalSupplies', [MedicalSuppliesController::class, 'storeMedicalSupplies'])->name('storeMedicalSupplies');
        Route::get('orders', [OrdersController::class, 'index'])->name('orders');
        Route::delete('delete-appointmet/{id}', [OrdersController::class, 'delete_appointmet'])->name('delete-appointmet');
        Route::delete('delete-order/{id}', [OrdersController::class, 'delete_order'])->name('delete-order');
        Route::get('/search-specializes', [SpecializesController::class, 'search'])->name('search_specializes');
        Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
        Route::get('/blogs/{id}', [BlogsController::class, 'show'])->name('blogs.show');
        Route::get('/all-blogs', [BlogsController::class, 'blogs'])->name('all_blogs');

        Route::get('blogCategory/{id}', [CategoryController::class, 'blogCategory'])->name('blogCategory');
        Route::get('appointment_details/{id}', [BookAppointmentController::class, 'appointment_details'])->name('appointment_details');
        Route::get('orders_details/{id}', [OrdersController::class, 'orders_details'])->name('orders_details');

        Route::get('blogQuestions', [QuestionsController::class, 'blogQuestions'])->name('blogQuestions');
        Route::get('public_blogQuestions', [QuestionsController::class, 'public_blogQuestions'])->name('public_blogQuestions');
        Route::get('blogquestionCategory/{id}', [CategoryController::class, 'blogquestionCategory'])->name('blogquestionCategory');
        Route::get('blog_public_questions' , [QuestionsController::class, 'blog_public_questions'])->name('blog_public_questions') ;
        Route::get('create_public_blogquestion' , [QuestionsController::class, 'create_public_blogquestion'])->name('create_public_blogquestion') ;


        Route::get('/alternative-medicine', [AlternativeMedicineController::class, 'doctors'])->name('alternative_medicine');
        Route::get('/alternative-medicine/doctor-details/{doctor_id}', [AlternativeMedicineController::class, 'doctor_details'])->name('alternative-medicine.doctor_details');

    });
});
