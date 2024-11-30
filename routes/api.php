<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseAdsController;
use App\Http\Controllers\TempControler;
use App\Http\Controllers\TrainingPlanController;
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
    return $request->user();

    Route::post('temp', [TempControler::class, 'temp']);

});

//Category
Route::group(['prefix' => 'course_ads'], function () {//ok
    Route::get('/', [CourseAdsController::class, 'getAllCourseAds']);
    Route::get('/search', [CourseAdsController::class, 'searchAdvanceCourseAds']);
    Route::get('/{id}', [CourseAdsController::class, 'getCourseAdsById']);
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

Route::group(['prefix' => 'about_us'], function () {
Route::get('/',[AboutUsController::class,'index']);
});

Route::group(['prefix' => 'Training_plan'], function () {
    Route::get('/',[TrainingPlanController::class,'index']);
    Route::get('/latestPlan',[TrainingPlanController::class,'getTrainingPlan']);
});



