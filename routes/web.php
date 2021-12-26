<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocationController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/property/{id}', [PropertyController::class, 'single'])->name('single-property');
    Route::get('/location/{id}', [LocationController::class, 'single'])->name('single-location');
    Route::get('/properties/', [PropertyController::class, 'index'])->name('properties');
    Route::get('/page/{slug}', [PageController::class, 'single'])->name('page');
    Route::post('/property-inquiry/{id}', [ContactController::class, 'propertyInquiry'])->name('property-inquiry');
});


// admin routes

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard-index');
    Route::get('/dashboard/properties', [DashboardController::class, 'properties'])->name('dashboard-properties');
    Route::get('/dashboard/add-property', [DashboardController::class, 'addProperty'])->name('add-property');
    Route::post('/dashboard/create-property', [DashboardController::class, 'createProperty'])->name('create-property');
    Route::post('/dashboard/update-property/{id}', [DashboardController::class, 'updateProperty'])->name('update-property');
    Route::post('/dashboard/delete-property/{id}', [DashboardController::class, 'deleteProperty'])->name('delete-property');
    Route::get('/dashboard/edit-property/{id}', [DashboardController::class, 'editProperty'])->name('edit-property');
    Route::post('/dashboard/delete-media/{media_id}', [DashboardController::class, 'deleteMedia'])->name('delete-media');

    Route::get('/dashboard/locations', [DashboardController::class, 'locations'])->name('dashboard-locations');
    Route::get('/dashboard/add-location', [DashboardController::class, 'addLocation'])->name('add-location');
    Route::post('/dashboard/create-location', [DashboardController::class, 'createLocation'])->name('create-location');
    Route::post('/dashboard/update-location/{id}', [DashboardController::class, 'updateLocation'])->name('update-location');
    Route::post('/dashboard/delete-location/{id}', [DashboardController::class, 'deleteLocation'])->name('delete-location');
    Route::get('/dashboard/edit-location/{id}', [DashboardController::class, 'editLocation'])->name('edit-location');

    Route::get('/dashboard/pages', [DashboardController::class, 'pages'])->name('dashboard-pages');
    Route::get('/dashboard/add-page', [DashboardController::class, 'addPage'])->name('add-page');
    Route::post('/dashboard/create-page', [DashboardController::class, 'createPage'])->name('create-page');
    Route::post('/dashboard/update-page/{id}', [DashboardController::class, 'updatePage'])->name('update-page');
    Route::post('/dashboard/delete-page/{id}', [DashboardController::class, 'deletePage'])->name('delete-page');
    Route::get('/dashboard/edit-page/{id}', [DashboardController::class, 'editPage'])->name('edit-page');

    Route::get('/dashboard/users', [DashboardController::class, 'users'])->name('dashboard-users');
    Route::get('/dashboard/add-user', [DashboardController::class, 'addUser'])->name('add-user');
    Route::post('/dashboard/create-user', [DashboardController::class, 'createUser'])->name('create-user');
    Route::post('/dashboard/update-user/{id}', [DashboardController::class, 'updateUser'])->name('update-user');
    Route::post('/dashboard/delete-user/{id}', [DashboardController::class, 'deleteUser'])->name('delete-user');
    Route::get('/dashboard/edit-user/{id}', [DashboardController::class, 'editUser'])->name('edit-user');

    Route::get('/dashboard/messages', [DashboardController::class, 'messages'])->name('dashboard-messages');
    Route::get('/dashboard/message/{id}', [DashboardController::class, 'singleMessage'])->name('message');
    Route::post('/dashboard/delete-message/{id}', [DashboardController::class, 'deleteMessage'])->name('delete-message');
});

require __DIR__.'/auth.php';
