<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\ElectiveController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin', AdminDashboard::class)->name('admin');
    Route::resource('/admin/classes', ClassController::class)->except('show');
    Route::resource('/admin/electives', ElectiveController::class)->except('show');
    Route::get('/admin/reports', [ReportController::class, 'index'])->name('reports');
    Route::get('/admin/reports/export', [ReportController::class, 'export'])->name('reports.export');
});

Route::delete('/admin/inscricoes/limpar-eletiva/{elective}', [\App\Http\Controllers\AdminDashboard::class, 'clearElective'])
    ->name('admin.clearElective');
Route::delete('/admin/inscricoes/limpar-todas', [\App\Http\Controllers\AdminDashboard::class, 'clearAll'])
    ->name('admin.clearAll');

Route::get('/inscricao', [RegistrationController::class, 'create'])->name('form');
Route::post('/inscricao', [RegistrationController::class, 'store'])->name('form.store');

require __DIR__ . '/auth.php';
