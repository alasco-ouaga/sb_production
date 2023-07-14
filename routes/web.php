<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\HomeController;

use Svg\Tag\Group;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\StructureController;
use App\Http\Controllers\admin\UsersController;


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



Auth::routes();
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    
    //route accessible par l'administrateur
    Route::middleware('adminRouteProtected')->group(function(){
        Route::get('/adminRoute/get/data', [StructureController::class, 'get_structure_data'])->name('get_structure_data');
        Route::get('/adminRoute/get/update/route/{id}', [StructureController::class, 'get_structure_update'])->name('get_structure_update');
        Route::post('/adminRoute/save/structure/update', [StructureController::class, 'save_structure_update'])->name('save_structure_update');
    });

    //route accessible par le gestionaire
    Route::middleware('gestionnaireRouteProtected')->group(function () {
        //structure
        Route::get('/gestionRouteProtected/save/structure/phone', [StructureController::class, 'get_structure_phone'])->name('get_structure_phone');
        Route::post('/gestionRouteProtected/delete/structure/phone/{id}', [StructureController::class, 'confirm_delete_structure'])->name('confirm_delete_structure');
        Route::post('/gestionRouteProtected/api/phone/create', [StructureController::class, 'phone_create']);
        Route::post('/gestionRouteProtected/api/phone/update', [StructureController::class, 'save_phone_update']);

        //Role
        Route::get('/gestionRouteProtected/roles/show', [StructureController::class, 'get_role'])->name('get_role');
        Route::get('/gestionRouteProtected/role/permission/{role_id}', [StructureController::class, 'get_role_permission'])->name('get_role_permission');

        //User
        Route::get('/gestionRouteProtected/user/create/form', [UsersController::class, 'user_create_form'])->name('user_create_form');
        Route::post('/gestionRouteProtected/user/create', [UsersController::class, 'save_user_create'])->name('save_user_create');
        Route::get('/gestionRouteProtected/user/show/begin', [UsersController::class, 'get_role'])->name('get_role');
        Route::get('/gestionRouteProtected/user/show/end/{role_id}', [UsersController::class, 'show_user'])->name('show_user');
        Route::get('/gestionRouteProtected/user/delete/{user_id}', [UsersController::class, 'delete_user'])->name('delete_user');
        Route::get('/gestionRouteProtected/user/authaurize/{user_id}', [UsersController::class, 'authaurize_user'])->name('authaurize_user');
        Route::get('/gestionRouteProtected/api/user/data/{user_id}', [UsersController::class, 'get_user_data']);
        Route::get('/gestionRouteProtected/api/user/info/{user_id}', [UsersController::class, 'get_user_info']);
        Route::post('/gestionRouteProtected/api/user/update/save', [UsersController::class, 'user_update_save']);
        Route::get('/gestionRouteProtected/api/get/role', [UsersController::class, 'get_role_to_create_user']);
        Route::post('/gestionRouteProtected/api/user/create/save', [UsersController::class, 'user_create_save']);

        
    });

    //route accessible par le secretaire
    Route::middleware('secretaireRouteProtected')->group(function () {

    });
});
