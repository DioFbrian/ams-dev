<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    // Route yang ingin diproteksi
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
    
    //Laptop Asset
    Route::get('/asset/laptop', [App\Http\Controllers\AssetController::class, 'manage_laptop'])->name('manage_laptop');
    Route::post('/asset/laptop/add', [App\Http\Controllers\LaptopController::class, 'add_laptop'])->name('add_laptop');
    Route::put('/asset/laptop/edit/{id}', [App\Http\Controllers\LaptopController::class, 'edit_laptop'])->name('edit_laptop');
    Route::delete('/asset/laptop/delete/{id}', [App\Http\Controllers\LaptopController::class, 'delete_laptop'])->name('delete_laptop');

    // Card Asset
    Route::get('/asset/card', [App\Http\Controllers\AssetController::class, 'manage_card'])->name('manage_card');
    Route::post('/asset/card/add', [App\Http\Controllers\CardController::class, 'add_card'])->name('add_card');
    Route::put('/asset/card/edit/{id}', [App\Http\Controllers\CardController::class, 'edit_card'])->name('edit_card');
    Route::delete('/asset/card/delete/{id}', [App\Http\Controllers\CardController::class, 'delete_card'])->name('delete_card');

    // Email Asset
    Route::get('/asset/email', [App\Http\Controllers\AssetController::class, 'manage_email'])->name('manage_email');
    Route::post('/asset/email/add', [App\Http\Controllers\EmailController::class, 'add_email'])->name('add_email');
    Route::put('/asset/email/edit/{id}', [App\Http\Controllers\EmailController::class, 'edit_email'])->name('edit_email');
    Route::delete('/asset/email/delete/{id}', [App\Http\Controllers\EmailController::class, 'delete_email'])->name('delete_email');

    // Holder
    Route::get('/manage/holder', [App\Http\Controllers\HolderController::class, 'manage_holder'])->name('manage_holder');
    Route::get('/manage/holder/view/{id}', [App\Http\Controllers\HolderController::class, 'view_holder'])->name('view_holder');
    Route::post('/manage/holder/add', [App\Http\Controllers\HolderController::class, 'add_holder'])->name('add_holder');
    // Route::put('/asset/email/edit/{id}', [App\Http\Controllers\EmailController::class, 'edit_email'])->name('edit_email');
    // Route::delete('/asset/email/delete/{id}', [App\Http\Controllers\EmailController::class, 'delete_email'])->name('delete_email');
});

