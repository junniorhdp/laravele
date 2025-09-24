<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RutinaController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
// -----------------------------
//  Landing page + Home
// -----------------------------
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// -----------------------------
//  Autenticación
// -----------------------------
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// -----------------------------
//  Usuario (rol cliente)
// -----------------------------
Route::middleware(['auth', 'role:usuario'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/show', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update', [UserController::class, 'update'])->name('users.update');
});

// -----------------------------
//  Profesional
// -----------------------------
Route::prefix('profesionales')->middleware(['auth', 'role:profesional'])->group(function () {
    Route::get('/profesionales', [ProfessionalController::class, 'index'])->name('profesionales.index');
    Route::get('/usuarios', [ProfessionalController::class, 'usuarios'])->name('profesionales.usuarios');
    Route::post('/usuarios/{id}/asignar-rutina', [ProfessionalController::class, 'asignarRutina'])->name('profesionales.asignarRutina');
    Route::post('/usuarios/{id}/valorar', [ProfessionalController::class, 'valorarUsuario'])->name('profesionales.valorar');
});

// -----------------------------
//  Administrador
// -----------------------------

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('usuarios', UserController::class);
    Route::resource('rutinas', RutinaController::class);
    Route::resource('ejercicios', EjercicioController::class);
    Route::get('/reportes', [ReportController::class, 'index'])->name('admin.reportes');
});

// -----------------------------
//  Paginas HTML5
// -----------------------------

Route::get('/membresia', [PageController::class, 'membresia'])->name('pages.membresia');
Route::get('/contacto', [PageController::class, 'contacto'])->name('pages.contacto');
Route::get('/nosotros', [PageController::class, 'nosotros'])->name('pages.nosotros');
 /*
 Route::get('/', function () {
    return view('welcome');
}); 
*/
/*
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('users',  UserController::class);
Route::resource('routines',  RoutineController::class);
Route::resource('professionals',  ProfessionalController::class);

Route::prefix('admin')->middleware(['auth'. 'role:admin'])->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('reports', [ReportController::class, 'index'])->name(admin.reports);
});
*/

