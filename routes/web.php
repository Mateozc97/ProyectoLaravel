<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\QaController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

// Ruta principal: Redirige a la página de login
Route::get('/', [AuthController::class, 'login'])->name('login');

require __DIR__.'/auth.php';

// auth
Route::prefix('auth')->group(function() {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginVerify'])->name('login.verify');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerVerify']);
    Route::post('signOut', [AuthController::class, 'signOut'])->name('signOut');
});

// Protegidas
Route::middleware('auth')->group(function() {
    // Ruta al dashboard principal
    Route::get('dashboard', function() {
        return view('dashboard.index');
    })->name('dashboard');

    // Rutas para los estudiantes
    Route::get('students', [StudentController::class, 'index'])->name('students.index');
    Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('students', [StudentController::class, 'store'])->name('students.store');

    // Rutas para las inscripciones
    Route::get('enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::get('enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
    Route::post('enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');

    // Ruta para la API Q&A
    Route::get('/qa', [QaController::class, 'index'])->name('qa.index'); // Ruta para mostrar el formulario de preguntas
    Route::post('/qa', [QaController::class, 'askQuestion'])->name('qa.ask'); // Ruta para manejar la solicitud de pregunta
});
