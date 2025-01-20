<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ContactUsIconsController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\CourseAdsController;
use App\Http\Controllers\FrequentlyQuestionController;
use App\Http\Controllers\PlanRegisterController;
use App\Http\Controllers\RegistrationsController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TempControler;
use App\Http\Controllers\TrainingPlanController;
use App\Http\Controllers\UpcomingCourseController;
use App\Http\Controllers\VenueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {


    Route::post('temp', [TempControler::class, 'temp']);
    return $request->user();
});

//Category
Route::group(['prefix' => 'course_ads'], function () {//ok
    Route::get('/', [CourseAdsController::class, 'getAllCourseAds']);
    Route::get('/search', [CourseAdsController::class, 'searchAdvanceCourseAds']);
    Route::get('/{id}', [CourseAdsController::class, 'getCourseAdsById']);
    Route::get('/getMap/filterCourse', [CourseAdsController::class, 'getMapFilterCourse']);
});

Route::group(['prefix' => 'category'], function () {//ok
    Route::get('/', [CategoryController::class, 'getAllCategory']);
    Route::get('/{id}', [CategoryController::class, 'getCategoryById']);

});

//venue
    Route::group(['prefix' => 'venue'], function () {//ok
    Route::get('/', [VenueController::class, 'getAllVenue']);
    Route::get('/{id}', [VenueController::class, 'getVenueById']);

});
Route::group(['prefix' => 'temp'], function () {//ok
    Route::get('/', [TempControler::class, 'helloWorld']);
    Route::get('/micro', [TempControler::class, 'micro']);
    Route::get('/t1', [TempControler::class, 'test1']);


});

Route::group(['prefix' => 'aboutUs'], function () {
Route::get('/',[AboutUsController::class,'index']);
});

Route::group(['prefix' => 'training_plan'], function () {
    Route::get('/',[TrainingPlanController::class,'index']);
    Route::get('/latestPlan',[TrainingPlanController::class,'getTrainingPlan']);
    Route::get('/{id}',[TrainingPlanController::class,'show'])->where('id', '[0-9]+');

});
Route::group(['prefix' => 'contact_us'], function () {
    Route::get('/',[ContactUsController::class,'index']);
    Route::get('/{contactUs}',[ContactUsController::class,'show']);
});
Route::group(['prefix' => 'contact_us_icons'], function () {
    Route::get('/',[ContactUsIconsController::class,'index']);
    Route::get('/{contactUsIcons}',[ContactUsIconsController::class,'show']);
});

Route::group(['prefix' => 'frequently_questions'], function () {
    Route::get('/',[FrequentlyQuestionController::class,'index']);
    Route::get('/{frequentlyQuestion}',[FrequentlyQuestionController::class,'show']);
});

Route::group(['prefix' => 'sliders'], function () {
    Route::get('/',[SliderController::class,'index']);
    Route::get('/{slider}',[SliderController::class,'show']);
});

Route::group(['prefix' => 'sections'], function () {
    Route::get('/',[SectionController::class,'index']);
    Route::get('/{section}',[SectionController::class,'show']);
});

Route::group(['prefix' => 'counters'], function () {
    Route::get('/',[CounterController::class,'index']);
    Route::get('/{counter}',[CounterController::class,'show']);
});

Route::group(['prefix' => 'clients'], function () {
    Route::get('/',[ClientController::class,'index']);
    Route::get('/{client}',[ClientController::class,'show']);
});

Route::group(['prefix' => 'plan_register'], function () {
    Route::post('/',[PlanRegisterController::class,'store']);
    Route::get('/',[PlanRegisterController::class,'index']);
    Route::get('/{planRegister}',[PlanRegisterController::class,'show']);
});

Route::group(['prefix' => 'registration'], function () {
    Route::post('/',[RegistrationsController::class,'store']);
    Route::get('/{registrations}',[RegistrationsController::class,'show']);
});

Route::group(['prefix' => '/upcoming-courses'], function () {
    Route::get('/',[UpcomingCourseController::class,'index']);
    Route::get('/{upcomingCourse}',[UpcomingCourseController::class,'show']);
});

Route::group(['prefix' => '/certificates'], function () {
    Route::get('/',[CertificateController::class,'index']);
    Route::get('/search',[CertificateController::class,'certificates_search']);
    Route::get('/{certificate}',[CertificateController::class,'show']);
});



