<?php
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\RealEstateController;
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
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('partners', [PartnerController::class, 'index']);
    Route::post('contact-us', [ContactUsController::class, 'store']);
    Route::get('settings', [ContactUsController::class, 'getSetting']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('profile-info', [UserController::class, 'profileInfo']);
        Route::apiResource('real-estates', RealEstateController::class);
    });
});
