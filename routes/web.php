<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PcBuildController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/pc-builds', [PcBuildController::class, 'index'])->name('pcbuilds.index');
    Route::get('/pc-builds/create', [PcBuildController::class, 'create'])->name('pcbuilds.create');
    Route::post('/pc-builds', [PcBuildController::class, 'store'])->name('pcbuilds.store');
    Route::get('/select-component/{type}', [PcBuildController::class, 'selectComponent'])->name('select.component');
    Route::get('/build/select-component/{type}', [PcBuildController::class, 'selectComponent'])->name('build.selectComponent');
    Route::post('/pc-builds', [PcBuildController::class, 'store'])->name('pcbuilds.store');
    Route::get('/build/add-component/{type}/{componentId}', [PcBuildController::class, 'addComponentToSession'])->name('build.addComponentToSession');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/add', function () {
        return view('admin.add');
    })->name('admin.add');
    Route::post('admin.add', [AdminController::class, 'add'])->name('admin.add');
});



require __DIR__.'/auth.php';
