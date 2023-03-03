<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
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
});

// MODIFICHIAMO LA ROTTA DELLA VIEW "DASHBOARD" PERCHE' ABBIAMO UN CONTROLLER CHE C'E' LA RESTITUISCE
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// COSI FACENDO HO APPLICATO IL MIDDLEWARE ONLY TO THE PBLUC FUNCTION "INDEX" DEL "DASHBOARDCONTROLLER"
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// QUESTO E' IL METODO DI GRUPPO
Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);
    Route::get('/fill', function(){
        Artisan::call('db:seed', ['--class' => 'ProjectSeeder']);
        return redirect()->route('admin.projects.index')->with('message', 'I Progetti sono stati creati correttamente');
    })->name('seeder');
    
    // PROVA DI LANCIO DI UN COMANDO DI SEEDER DALLA VIEW
    Route::get('/reset', function(){
        Artisan::call('db:seed', ['--class' => 'ProjectSeeder']);
        return redirect()->route('admin.projects.index')->with('message', 'I Progetti sono stati creati correttamente');
    })->name('seeder');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
