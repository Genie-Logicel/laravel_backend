<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EtudesController;
use App\Http\Controllers\AutreCompetencesController;
use App\Http\Controllers\LoginController;

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

// * login
Route::get('/login',  [LoginController::class, 'login' ])->name('login');


//competence
Route::get('/add_competence',  [CompetenceController::class, 'add_competence' ])->name('add_competence');
Route::post('/add_competence',  [CompetenceController::class, 'add_competence_submit' ])->name('add.competence.submit');
Route::get('/liste_competence',  [CompetenceController::class, 'liste_competence' ])->name('liste_competence');
Route::get('/delete_competence/{id}',  [CompetenceController::class, 'delete_competence' ])->name('delete_competence');
Route::get('/edit_competence/{id}',  [CompetenceController::class, 'edit_competence' ])->name('edit_competence');
Route::post('/edit_competence/{id}',  [CompetenceController::class, 'competence_submit' ])->name('competence.submit');

//role
Route::get('/add_role',  [RoleController::class, 'add_role' ])->name('add_role');
Route::post('/add_role',  [RoleController::class, 'add_role_submit' ])->name('add.role.submit');
Route::get('/liste_role',  [RoleController::class, 'liste_role' ])->name('liste_role');
Route::get('/delete_role/{id}',  [RoleController::class, 'delete_role' ])->name('delete_role');
Route::get('/edit_role/{id}',  [RoleController::class, 'edit_role' ])->name('edit_role');
Route::post('/edit_role/{id}',  [RoleController::class, 'role_submit' ])->name('role.submit');


Route::resource('etude', EtudesController::class);
Route::resource('autre-competence', AutreCompetencesController::class);

