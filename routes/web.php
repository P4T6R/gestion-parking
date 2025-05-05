<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController; // Added this line to import ReportController
use App\Models\Vehicle; // Added this line to import Vehicle model

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
    return view('auth.login');
});

// Ici, vous avez déclaré deux fois la même route resource pour 'users'.
// Vous devez en supprimer une et utiliser la syntaxe avec ::class pour la définition du contrôleur.
// Route::resource('users', 'UserController'); // Cette ligne est en double et doit être supprimée.
Route::resource('users', UserController::class); // Utilisez cette ligne pour la définition de la route resource.

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Cette ligne est commentée, donc je vais la laisser telle quelle.
    // Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');

    // Utilisez la syntaxe ::class pour toutes les routes resource.
    Route::resource('/user', UserController::class);
    Route::resource('/customers', App\Http\Controllers\CustomerController::class);
    Route::resource('/categories', App\Http\Controllers\CategoryController::class);
    Route::resource('/vehicles', App\Http\Controllers\VehicleController::class);
    Route::resource('/vehiclesIn', App\Http\Controllers\VehicleInController::class);
    Route::resource('/vehiclesOut', App\Http\Controllers\VehicleOutController::class);

    Route::get('reports/index', [App\Http\Controllers\ReportController::class, 'index'])->name('reports.index');
    
    // Using the regular UserController instead of AdminUserController
    Route::get('/admin/table', [UserController::class, 'index']);
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/{vehicle}/ticket', [ReportController::class, 'downloadTicket'])->name('reports.ticket');
});

// Utilisez la syntaxe ::class pour définir le contrôleur et la méthode.
Route::post('/user/create', [UserController::class, 'create']);

// This route is redundant as we already have Route::get('/reports/{vehicle}/ticket', [ReportController::class, 'downloadTicket'])->name('reports.ticket');
// Route::get('/ticket/download', [ReportController::class, 'downloadTicket'])->name('downloadTicket');

// Added this route to test the ticket view
Route::get('/test-ticket/{vehicle}', function (Vehicle $vehicle) {
    return view('reports.ticket', ['vehicle' => $vehicle]);
});

use App\Http\Controllers\VehicleController;

Route::get('/vehiclein/table', [VehicleController::class, 'table'])->name('vehicleIn.table');