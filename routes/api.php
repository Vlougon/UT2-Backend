<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PhoneUserController;
use App\Http\Controllers\Api\BeneficiaryController;
use App\Http\Controllers\Api\PhoneBeneficiaryController;
use App\Http\Controllers\Api\CallController;
use App\Http\Controllers\Api\MedicalDataController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\PhoneContactController;
use App\Http\Controllers\Api\ReminderController;
use App\Http\Controllers\Api\AddressController;
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
    Route::resource('phone_users', PhoneUserController::class);

    // Rutas para Beneficiary
    Route::resource('beneficiaries', BeneficiaryController::class);

    // Rutas para Phone_Beneficiary
    Route::resource('phone_beneficiaries', PhoneBeneficiaryController::class);

    // Rutas para Call
    Route::resource('calls', CallController::class);

    // Rutas para MedicalData
    Route::resource('medical_data', MedicalDataController::class);

    // Rutas para Contact
    Route::resource('contacts', ContactController::class);

    // Rutas para Phone_Contact
    Route::resource('phone_contacts', PhoneContactController::class);

    // Rutas para Reminder
    Route::resource('reminders', ReminderController::class);

    // Rutas para Address
    Route::resource('addresses', AddressController::class);
});
