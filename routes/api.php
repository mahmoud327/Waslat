<?php

use App\Http\Controllers\Api\AboutUsController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\BookingRealEstateController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\RequestRealEstateController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\RealEstateController;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
####### auth #########
Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('verify-mobile-sms', [AuthController::class, 'verifyMobileSms']);
    Route::post('send-otp', [AuthController::class, 'sendOtp']);
    Route::post('verify-otp', [AuthController::class, 'verifyOtp']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
    });
    Route::post('resend-otp', [AuthController::class, 'resendOtp']);
});
Route::group(['middleware' => ['ChangeLanguage']], function () {
    Route::get('home-real-estates', [RealEstateController::class, 'homeRealEstates']);
    Route::get('home-real-estates/{id}', [RealEstateController::class, 'show']);
    Route::get('cities', [CityController::class, 'index']);
    Route::get('states', [CityController::class, 'states']);
    Route::get('banners', [BannerController::class, 'index']);
    Route::get('about-us', [AboutUsController::class, 'index']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('features', [CategoryController::class, 'getFeatures']);
    Route::get('partners', [PartnerController::class, 'index']);
    Route::apiResource('blogs', BlogController::class);
    Route::apiResource('projects', ProjectController::class);
    Route::post('booking-project',[ProjectController::class,'bookingProject']);
    Route::get('certificates', [PartnerController::class, 'certificates']);
    Route::post('contact-us', [ContactUsController::class, 'store']);
    Route::get('settings', [ContactUsController::class, 'getSetting']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('profile-info', [UserController::class, 'profileInfo']);
        Route::post('update-profile', [UserController::class, 'updateProfile']);
        Route::apiResource('real-estates', RealEstateController::class);
        Route::post('notify-real-estates', [RealEstateController::class,'notifyRealEstates']);
        Route::apiResource('booking-real-estates',BookingRealEstateController::class);
        Route::apiResource('request-real-estates', RequestRealEstateController::class);
    });
});
