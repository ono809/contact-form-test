<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
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


Route::get('/', [ContactController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/thanks', [ContactController::class, 'send'])->name('contact.send');

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);



// Route::post('/register/confirm', function (Request $request) {
//     $validated = $request->validate([
//         'name' => 'required',
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);
//     return view('register.confirm', ['inputs' => $validated]);
// })->name('register.confirm');

Route::post('/register/thanks', function (Request $request) {
    // 本来は DB 登録などを書く場所
    return view('register.thanks');
})->name('register.thanks');


Route::middleware(['auth'])->group(function () {
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');
Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth']);
