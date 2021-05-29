<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[App\Http\Controllers\TopicController::class,'welcome'] )
    ->name('topic.welcome');


    // Web routes Admin

Route::middleware(['auth:sanctum', 'verified','authadmin'])
->get('/admin/dashboard',[App\Http\Controllers\ModulesController::class,'show_dash'])
->name('admin.dashboard');

Route::middleware(['auth:sanctum', 'verified','authadmin'])
->get('/admin/etudiants', function () {
    return view('admin.etudiants');
})->name('admin.etudiants');

// ajout modules
Route::middleware(['auth:sanctum', 'verified','authadmin'])
->get('/admin/etudiants', function () {
    return view('admin.etudiants');
})->name('admin.etudiants');

Route::middleware(['auth:sanctum', 'verified','authadmin'])
->post('/admin/modules',[App\Http\Controllers\ModulesController::class, 'store'])
->name('modules.store');
Route::middleware(['auth:sanctum', 'verified','authadmin'])
->get('/admin/modules',[App\Http\Controllers\ModulesController::class,'show_Modules'])
->name('admin.modules');

Route::middleware(['auth:sanctum', 'verified','authadmin'])
->get('/admin/cours',[App\Http\Controllers\CoursController::class,'show_cours'])
->name('admin.cours');

Route::middleware(['auth:sanctum', 'verified','authadmin'])
->post('/admin/cours',[App\Http\Controllers\CoursController::class, 'store'])
->name('cours.store');
Route::middleware(['auth:sanctum', 'verified','authadmin'])
->get('/admin/enseignants',[App\Http\Controllers\CoursController::class,'show'])
->name('admin.enseignants');

Route::middleware(['auth:sanctum', 'verified','authadmin'])
->post('/admin/enseignants',[App\Http\Controllers\EnseignantsController::class, 'store'])
->name('enseignants.store');

// Forum

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/user/dashboard',[App\Http\Controllers\TopicController::class,'index'] )
    ->name('topic.index');
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/user/create',[App\Http\Controllers\TopicController::class,'create'] )
    ->name('topic.create');
Route::middleware(['auth:sanctum', 'verified'])
    ->post('/user/create',[App\Http\Controllers\TopicController::class,'store'])
    ->name('topic.store');
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/user/show/{id}',[App\Http\Controllers\TopicController::class,'show'])
    ->name('topic.show');
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/user/edit/{id}',[App\Http\Controllers\TopicController::class,'edit'])
    ->name('topic.edit');
Route::middleware(['auth:sanctum', 'verified'])
    ->post('/user/show/{id}',[App\Http\Controllers\TopicController::class,'update'])
    ->name('topic.update');
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/user/delete/{id}',[App\Http\Controllers\TopicController::class,'destroy'])
    ->name('topic.destroy');

// Wed routes user

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/user/inscription',[App\Http\Controllers\ModulesController::class,'inscription'])
    ->name('inscription');

Route::middleware(['auth:sanctum', 'verified'])
    ->post('/user/inscription',[App\Http\Controllers\InscriptionsController::class,'store'])
    ->name('inscription.store');

// commment
Route::middleware(['auth:sanctum', 'verified'])
    ->post('/comment/{id}',[App\Http\Controllers\CommentController::class,'store'] )
	->name('comment.store');
    

