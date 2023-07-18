<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RestoranController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Middleware\RoleMiddleware;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware'=> ['auth']], function(){
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    Route::get('/food', [FoodController::class, 'index'])->name('food.index');
    Route::get('/restoran', [RestoranController::class, 'index'])->name('restoran.index');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
});

Route::middleware(['role:Admin'])->group(function () {
    Route::get('/food', [FoodController::class, 'index'])->name('food.index');
    Route::get('/restoran', [RestoranController::class, 'index'])->name('restoran.index');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
})->middleware(RoleMiddleware::class);

Route::middleware(['role:User'])->group(function () {
    Route::get('/food', [FoodController::class, 'index'])->name('food.index');
    Route::get('/restoran', [RestoranController::class, 'index'])->name('restoran.index');
})->middleware(RoleMiddleware::class);

Route::get('/food', [FoodController::class, 'index'])->name('food.index');
Route::get('/food/create', [FoodController::class, 'create'])->name('food.create');
Route::post('/food/store', [FoodController::class, 'store'])->name('food.store');
Route::get('/food/edit/{id}', [FoodController::class, 'edit'])->name('food.edit');
Route::post('/food/update/{id}', [FoodController::class, 'update'])->name('food.update');
Route::get('/food/delete/{id}', [FoodController::class, 'destroy'])->name('food.delete');

Route::get('/restoran', [RestoranController::class, 'index'])->name('restoran.index');
Route::get('/restoran/create', [RestoranController::class, 'create'])->name('restoran.create');
Route::post('/restoran/store', [RestoranController::class, 'store'])->name('restoran.store');
Route::get('/restoran/edit/{id}', [RestoranController::class, 'edit'])->name('restoran.edit');
Route::put('/restoran/update/{id}', [RestoranController::class, 'update'])->name('restoran.update');
Route::get('/restoran/delete/{id}', [RestoranController::class, 'destroy'])->name('restoran.delete');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::patch('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
Route::patch('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::get('/roles/delete/{id}', [RoleController::class, 'destroy'])->name('roles.delete');

Route::resource('/posts', App\Http\Controllers\PostController::class);

// Route::middleware('role:admin')->get('/dashboard', function () {
//     return 'Dashboard';
// })->name('dashboard');
