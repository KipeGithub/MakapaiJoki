<?php

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

Route::get('/', function () {
	return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ATSMessageController;
use App\Http\Controllers\NOTAMController;
use App\Http\Controllers\MeteoController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\OutboxController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\FPLController;
use App\Http\Controllers\RouteController;

use App\Models\User;
use App\Models\ATSMessage;
use App\Models\NOTAM;
use App\Models\meteo;
use App\Models\Inbox;
use App\Models\Outbox;
use App\Models\Maintenance;
use App\Models\FPL;




Route::get('/', function () {
	return redirect('/dashboard');
})->middleware('auth');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');


Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [HomeController::class, 'index'])->name('virtual-reality');
	Route::get('/rtl', [HomeController::class, 'index'])->name('rtl');

	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
	Route::post('/profile/update_pw', [UserProfileController::class, 'update_pw'])->name('profile.update_pw');

	Route::get('/profile-static', [HomeController::class, 'index'])->name('profile-static');
	Route::get('/sign-in-static', [HomeController::class, 'index'])->name('sign-in-static');
	Route::get('/sign-up-static', [HomeController::class, 'index'])->name('sign-up-static');


	// Route::resource('/informasi', InformasiController::class);
	Route::resource('/usermgt', UserController::class);
	Route::resource('/atsmessage', ATSMessageController::class);
	Route::resource('/notam', NOTAMController::class);
	Route::resource('/meteo', MeteoController::class);
	Route::resource('/inbox', InboxController::class);
	Route::resource('/outbox', OutboxController::class);
	Route::resource('/maintenance', MaintenanceController::class);
	Route::resource('/fpl', FPLController::class);

	Route::get('/inbox/ats/{id}', [InboxController::class, 'showAts']);
	Route::get('/inbox/fpl/{id}', [InboxController::class, 'showFpl']);
	Route::get('/inbox/metar/{id}', [InboxController::class, 'showMetar']);
	Route::get('/inbox/notam/{id}', [InboxController::class, 'showNotam']);
	Route::delete('/inbox/delete/{type}/{id}', [InboxController::class, 'deleteMessage']);

	Route::get('/outbox/ats/{id}', [OutboxController::class, 'showAts']);
	Route::get('/outbox/fpl/{id}', [OutboxController::class, 'showFpl']);
	Route::get('/outbox/metar/{id}', [OutboxController::class, 'showMetar']);
	Route::get('/outbox/notam/{id}', [OutboxController::class, 'showNotam']);
	Route::delete('/outbox/delete/{type}/{id}', [OutboxController::class, 'deleteMessage']);



	Route::get('/get-route', 'App\Http\Controllers\RouteController@getRoute');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
