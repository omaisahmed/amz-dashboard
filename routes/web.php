<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Client\ClientAdminController;
use App\Http\Controllers\RedirectionController;
use App\Http\Controllers\User\UserController;

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
//     return redirect('/home/dashboard');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::get('dashboard/user' , [AdminController::class , 'index'])->name('dashboard.user');

Route::get('/', [RedirectionController::class, 'redirection'])->name('redirection');


Route::group(['middleware' => 'auth'] , function(){

    Route::get('dashboard' , [AdminController::class , 'dashboard'])->name('dashboard');


    Route::group(['middleware' => 'CheckAuthPermission:admin' , 'prefix' => 'admin' , 'as' => 'admin.'], function(){
     
        Route::get('/' , [AdminController::class , 'dashboard'])->name('dashboard');

        Route::prefix('user')->group(function () {

             Route::get('/' , [UserController::class , 'index'])->name('user.index');
             Route::get('/create' , [UserController::class , 'create'])->name('user.create');
             Route::post('/store' , [UserController::class , 'store'])->name('user.store');
             Route::get('/delete/{id}' , [UserController::class , 'destroy'])->name('user.delete');
            
            //  Route::get('/edit/{id}' , [AdminController::class , 'edit'])->name('user.edit');
            //  Route::post('/update/{id}' , [AdminController::class , 'update'])->name('user.update');
            //  Route::get('/delete/{id}' , [AdminController::class , 'destroy'])->name('user.delete');

        }); // End of user access 

    }); // End of user access

    Route::group(['middleware' => 'CheckAuthPermission:superadmin' , 'prefix' => 'superadmin' , 'as' => 'superadmin.'], function(){
     
        Route::get('/' , [UserController::class , 'dashboard'])->name('dashboard');

        Route::prefix('user')->group(function () {

             Route::get('/' , [UserController::class , 'index'])->name('user.index');
             Route::get('/create' , [UserController::class , 'create'])->name('user.create');
             Route::post('/store' , [UserController::class , 'store'])->name('user.store');
             Route::get('/delete/{id}' , [UserController::class , 'destroy'])->name('user.delete');

        }); // End of user access 

    }); // End of user access

   

    Route::group(['middleware' => 'CheckAuthPermission:client' , 'prefix' => 'client' , 'as' => 'client.'], function(){
     
        Route::get('/' , [ClientAdminController::class , 'dashboard'])->name('dashboard');

        Route::prefix('user')->group(function () {

             Route::get('/' , [ClientAdminController::class , 'index'])->name('client.user');

        }); // End of user access 

    }); // End of user access

    

});

Route::get('/', function () {
    return view('auth.login');
});

// Auth::routes();

