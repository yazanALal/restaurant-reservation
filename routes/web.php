<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\MenuController as FrontMenuController;
use App\Http\Controllers\Front\ReservationController as FrontReservationController;
use App\Http\Controllers\Front\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
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
    $specials=Category::where('name','special')->with('menus')->first();
    return view('welcome',compact('specials'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/categories',[FrontCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}',[FrontCategoryController::class, 'show'])->name('categories.show');
Route::get('/menus',[FrontMenuController::class, 'index'])->name('menus.index');
Route::get('/reservations/step-one',[FrontReservationController::class, 'stepOne'])->name('reservations.step.one');
Route::get('/reservations/step-two',[FrontReservationController::class, 'stepTwo'])->name('reservations.step.two');
Route::post('/reservations/step-one',[FrontReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
Route::post('/reservations/step-two',[FrontReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');
Route::get('thankYou', function () {
    return view('thankYou');
})->name('thankYou');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
 
Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/reservations',ReservationController::class);
    Route::resource('/tables',TableController::class);
    Route::resource('/menus',MenuController::class);
});
require __DIR__.'/auth.php';
