<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModulesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Wed routes user
Route::middleware(['auth:sanctum', 'verified'])->get('/user/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/user/inscription', function () {
    return view('inscription');
})->name('inscription');

// Web routes Admin

Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/modules', function () {
    return view('admin.modules');
})->name('admin.modules');

// Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/cours', function () {
//     return view('admin.cours');
// })->name('admin.cours');
// Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/enseignants', function () {
//     return view('admin.enseignants');
// })->name('admin.enseignants');
Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/etudiants', function () {
    return view('admin.etudiants');
})->name('admin.etudiants');

// ajout modules
Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/etudiants', function () {
    return view('admin.etudiants');
})->name('admin.etudiants');

Route::middleware(['auth:sanctum', 'verified','authadmin'])->post('/admin/modules',[App\Http\Controllers\ModulesController::class, 'store'])->name('modules.store');
// Route::middleware(['auth:sanctum', 'verified','authadmin'])->post('/admin/modules',[App\Http\Controllers\userController::class, 'home'])->name('home');
Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/cours',[App\Http\Controllers\ModulesController::class,'show'])->name('admin.cours');

Route::middleware(['auth:sanctum', 'verified','authadmin'])->post('/admin/cours',[App\Http\Controllers\CoursController::class, 'store'])->name('cours.store');
Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/enseignants',[App\Http\Controllers\CoursController::class,'show'])->name('admin.enseignants');

Route::middleware(['auth:sanctum', 'verified','authadmin'])->post('/admin/enseignants',[App\Http\Controllers\EnseignantsController::class, 'store'])->name('enseignants.store');