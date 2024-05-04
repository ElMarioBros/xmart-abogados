<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LegalCasesController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AudienceController;

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

Route::get('/dashboard', [LegalCasesController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/users', [UsersController::class, 'index'])->name('user.index');
Route::get('/create-user', [UsersController::class, 'create'])->name('user.create');
Route::post('/create-user', [UsersController::class, 'store'])->name('user.store');

Route::get('/create-case', [LegalCasesController::class, 'create'])->name('legalcase.create');
Route::post('/create-case', [LegalCasesController::class, 'store'])->name('legalcase.store');
Route::get('/case/{id}', [LegalCasesController::class, 'show'])->name('legalcase.show');
Route::post('/case/{id}', [LegalCasesController::class, 'updateSatisfactionLevel'])->name('legalcase.updateSatisfaction');
Route::post('/case-pay/{id}', [PaymentsController::class, 'store'])->name('legalcase.make-payment');

Route::post('/new-case-audience/{id}', [AudienceController::class, 'store'])->name('audience.store');

Route::get('/upload-photos/{target}/{id}', [LegalCasesController::class, 'uploadPicturesShow'])->name('legalcase.uploadPicture.show');
Route::post('/upload-photos/{target}/{id}', [LegalCasesController::class, 'uploadPicturesStore'])->name('legalcase.uploadPicture.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
