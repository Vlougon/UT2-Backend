<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PhoneUserController;
use App\Http\Controllers\Api\V1\BeneficiaryController;
use App\Http\Controllers\Api\V1\PhoneBeneficiaryController;
use App\Http\Controllers\Api\V1\CallController;
use App\Http\Controllers\Api\V1\MedicalDataController;
use App\Http\Controllers\Api\V1\ContactController;
use App\Http\Controllers\Api\V1\PhoneContactController;
use App\Http\Controllers\Api\V1\ReminderController;
use App\Http\Controllers\Api\V1\AddressController;
use App\Http\Controllers\Api\V1\UserController;

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
});


Route::prefix('V1')->group(function () {
    // Rutas para User
    Route::apiResource('users', UserController::class);

    // Rutas para Phone_User
    Route::apiResource('phone_users', PhoneUserController::class);

    // Rutas para Beneficiary
    Route::apiResource('beneficiaries', BeneficiaryController::class);

    // Rutas para Phone_Beneficiary
    Route::apiResource('phone_beneficiaries', PhoneBeneficiaryController::class);

    // Rutas para Call
    Route::apiResource('calls', CallController::class);

    // Rutas para MedicalData
    Route::apiResource('medical_data', MedicalDataController::class);

    // Rutas para Contact
    Route::apiResource('contacts', ContactController::class);

    // Rutas para Phone_Contact
    Route::apiResource('phone_contacts', PhoneContactController::class);

    // Rutas para Reminder
    Route::apiResource('reminders', ReminderController::class);

    // Rutas para Address
    Route::apiResource('addresses', AddressController::class);
});
