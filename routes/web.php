<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacantController;
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
})->name('home');

Route::get('/dashboard', [VacantController::class, 'index'])->middleware(['auth', 'verified', 'recruter.roll'])->name('vacant.index');
Route::get('/vacant/create', [VacantController::class, 'create'])->middleware(['auth', 'verified'])->name('vacant.create');
Route::get('/vacant/{vacant}/edit', [VacantController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacant.edit');
Route::get('/vacant/{vacant}', [VacantController::class, 'show'])->name('vacant.show');
Route::get('/candidate/{vacant}', [CandidateController::class, 'index'])->name('candidate.index');

// Notification

Route::get('/notification', NotificationController::class)->middleware(['auth', 'verified', 'recruter.roll'])->name('notification');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// En el caso de los controladores 'Invokable' no es necesario la sintaxis de "[]" cuando se manda a llamar el controlador, ya que este automaticamente tomara el unico metodo que tiene disponible "--invoke"

require __DIR__.'/auth.php';
