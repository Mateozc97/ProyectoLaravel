<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\QaController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfesorController;

// Ruta principal: Redirige a la página de login
Route::get('/', [AuthController::class, 'login'])->name('login');

require __DIR__.'/auth.php';

// Rutas para autenticación
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginVerify'])->name('login.verify');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerVerify']);
    Route::post('signOut', [AuthController::class, 'signOut'])->name('signOut');
});

// Rutas protegidas con middleware de autenticación
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    // Q&A API
    Route::get('/qa', [QaController::class, 'index'])->name('qa.index');
    Route::post('/qa/ask', [QaController::class, 'askQuestion'])->name('qa.ask');

    // Estudiantes
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');

    // Inscripciones
    Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::get('/enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
    Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');

    // Profesores
    Route::get('/profesores', [ProfesorController::class, 'index'])->name('profesores.index');
});
