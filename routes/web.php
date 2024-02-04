<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('user', App\Http\Controllers\UserController::class);

Route::resource('phone-user', App\Http\Controllers\PhoneUserController::class);

Route::resource('beneficiary', App\Http\Controllers\BeneficiaryController::class);

Route::resource('phone-beneficiary', App\Http\Controllers\PhoneBeneficiaryController::class);

Route::resource('call', App\Http\Controllers\CallController::class);

Route::resource('medical-data', App\Http\Controllers\MedicalDataController::class);

Route::resource('contact', App\Http\Controllers\ContactController::class);

Route::resource('phone-contact', App\Http\Controllers\PhoneContactController::class);

Route::resource('address', App\Http\Controllers\AddressController::class);

Route::resource('reminder', App\Http\Controllers\ReminderController::class);


Route::resource('user', App\Http\Controllers\UserController::class);

Route::resource('phone-user', App\Http\Controllers\PhoneUserController::class);

Route::resource('beneficiary', App\Http\Controllers\BeneficiaryController::class);

Route::resource('phone-beneficiary', App\Http\Controllers\PhoneBeneficiaryController::class);

Route::resource('call', App\Http\Controllers\CallController::class);

Route::resource('medical-data', App\Http\Controllers\MedicalDataController::class);

Route::resource('contact', App\Http\Controllers\ContactController::class);

Route::resource('phone-contact', App\Http\Controllers\PhoneContactController::class);

Route::resource('address', App\Http\Controllers\AddressController::class);

Route::resource('reminder', App\Http\Controllers\ReminderController::class);


Route::get('user/error', [App\Http\Controllers\UserController::class, 'error']);
Route::resource('user', App\Http\Controllers\UserController::class);

Route::resource('phone-user', App\Http\Controllers\PhoneUserController::class);

Route::resource('beneficiary', App\Http\Controllers\BeneficiaryController::class);

Route::resource('phone-beneficiary', App\Http\Controllers\PhoneBeneficiaryController::class);

Route::resource('call', App\Http\Controllers\CallController::class);

Route::resource('medical-data', App\Http\Controllers\MedicalDataController::class);

Route::resource('contact', App\Http\Controllers\ContactController::class);

Route::resource('phone-contact', App\Http\Controllers\PhoneContactController::class);

Route::resource('address', App\Http\Controllers\AddressController::class);

Route::resource('reminder', App\Http\Controllers\ReminderController::class);


Route::get('user/error', [App\Http\Controllers\Api\UserController::class, 'error']);
Route::resource('user', App\Http\Controllers\Api\UserController::class);

Route::resource('phone-user', App\Http\Controllers\Api\PhoneUserController::class);

Route::resource('beneficiary', App\Http\Controllers\Api\BeneficiaryController::class);

Route::resource('phone-beneficiary', App\Http\Controllers\Api\PhoneBeneficiaryController::class);

Route::resource('call', App\Http\Controllers\Api\CallController::class);

Route::resource('medical-data', App\Http\Controllers\Api\MedicalDataController::class);

Route::resource('contact', App\Http\Controllers\Api\ContactController::class);

Route::resource('phone-contact', App\Http\Controllers\Api\PhoneContactController::class);

Route::resource('address', App\Http\Controllers\Api\AddressController::class);

Route::resource('reminder', App\Http\Controllers\Api\ReminderController::class);


Route::get('user/error', [App\Http\Controllers\Api\UserController::class, 'error']);
Route::resource('user', App\Http\Controllers\Api\UserController::class);

Route::get('phone-user/error', [App\Http\Controllers\Api\PhoneUserController::class, 'error']);
Route::resource('phone-user', App\Http\Controllers\Api\PhoneUserController::class);

Route::get('beneficiary/error', [App\Http\Controllers\Api\BeneficiaryController::class, 'error']);
Route::resource('beneficiary', App\Http\Controllers\Api\BeneficiaryController::class);

Route::get('phone-beneficiary/error', [App\Http\Controllers\Api\PhoneBeneficiaryController::class, 'error']);
Route::resource('phone-beneficiary', App\Http\Controllers\Api\PhoneBeneficiaryController::class);

Route::get('call/error', [App\Http\Controllers\Api\CallController::class, 'error']);
Route::resource('call', App\Http\Controllers\Api\CallController::class);

Route::resource('medical-data', App\Http\Controllers\Api\MedicalDataController::class);

Route::resource('contact', App\Http\Controllers\Api\ContactController::class);

Route::resource('phone-contact', App\Http\Controllers\Api\PhoneContactController::class);

Route::resource('address', App\Http\Controllers\Api\AddressController::class);

Route::resource('reminder', App\Http\Controllers\Api\ReminderController::class);


Route::get('user/error', [App\Http\Controllers\Api\UserController::class, 'error']);
Route::resource('user', App\Http\Controllers\Api\UserController::class);

Route::get('phone-user/error', [App\Http\Controllers\Api\PhoneUserController::class, 'error']);
Route::resource('phone-user', App\Http\Controllers\Api\PhoneUserController::class);

Route::get('beneficiary/error', [App\Http\Controllers\Api\BeneficiaryController::class, 'error']);
Route::resource('beneficiary', App\Http\Controllers\Api\BeneficiaryController::class);

Route::get('phone-beneficiary/error', [App\Http\Controllers\Api\PhoneBeneficiaryController::class, 'error']);
Route::resource('phone-beneficiary', App\Http\Controllers\Api\PhoneBeneficiaryController::class);

Route::get('call/error', [App\Http\Controllers\Api\CallController::class, 'error']);
Route::resource('call', App\Http\Controllers\Api\CallController::class);

Route::resource('medical-data', App\Http\Controllers\Api\MedicalDataController::class);

Route::resource('contact', App\Http\Controllers\Api\ContactController::class);

Route::resource('phone-contact', App\Http\Controllers\Api\PhoneContactController::class);

Route::resource('address', App\Http\Controllers\Api\AddressController::class);

Route::resource('reminder', App\Http\Controllers\Api\ReminderController::class);
