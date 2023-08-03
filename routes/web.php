<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EtudesController;
use App\Http\Controllers\AutreCompetencesController;
use App\Http\Controllers\FormationController;

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

//formation 
Route::get('/add_formation',  [FormationController::class, 'add_formation' ])->name('add_formation');
Route::post('/add_formation',  [FormationController::class, 'add_formation_submit' ])->name('add.formation.submit');
Route::get('/liste_formation',  [FormationController::class, 'liste_formation' ])->name('liste_formation');
Route::get('/delete_formation/{id}',  [FormationController::class, 'delete_formation' ])->name('delete_formation');
Route::get('/edit_formation/{id}',  [FormationController::class, 'edit_formation' ])->name('edit_formation');
Route::post('/edit_formation/{id}',  [FormationController::class, 'update' ])->name('formation.submit');




