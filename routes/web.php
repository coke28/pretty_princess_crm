<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/', 'PageController@indexPage')->name('get.index');
Route::get('/login', 'PageController@loginPage')->name('get.login');
Route::post('/login', 'Auth\AuthenticatedSessionController@store')->name('post.login');

Route::middleware('auth')->group(function () {


  Route::group(['middleware' => 'role.checker:admin', 'prefix' => 'admin'], function () {
    // Define your routes here
    Route::group(['prefix' => 'user'], function () {
      //User Routes
      Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
      Route::post('table', [UserController::class, 'userTB'])->name('admin.user.table');
      Route::post('add', [UserController::class, 'userAdd'])->name('admin.user.add');
      Route::get('get/{user}', [UserController::class, 'userGet'])->name('admin.user.get');
      Route::post('edit/{user}', [UserController::class, 'userEdit'])->name('admin.user.edit');
      // Route::post('delete/{user}', [UserController::class, 'userDelete'])->name('admin.user.delete');
    });
    Route::group(['prefix' => 'userRole'], function () {
      //User Role Routes
      Route::get('/', [UserRoleController::class, 'index'])->name('admin.userRole.index');
      Route::post('table', [UserRoleController::class, 'userRoleTB'])->name('admin.userRole.table');
      Route::post('add', [UserRoleController::class, 'userRoleAdd'])->name('admin.userRole.add');
      Route::get('get/{userRole}', [UserRoleController::class, 'userRoleGet'])->name('admin.userRole.get');
      Route::post('edit/{userRole}', [UserRoleController::class, 'userRoleEdit'])->name('admin.userRole.edit');
      Route::post('delete/{userRole}', [UserRoleController::class, 'userRoleDelete'])->name('admin.userRole.delete');
    });
  });



  Route::post('/logout', 'Auth\AuthenticatedSessionController@destroy')->name('logout');
  Route::get('/dashboard', 'PageController@dashboardPage')->name('user.dash');
});

// Route::get('/', function () {
//     return redirect('index');
// });
//
// $menu = theme()->getMenu();
// array_walk($menu, function ($val) {
//     if (isset($val['path'])) {
//         $route = Route::get($val['path'], [PagesController::class, 'index']);
//
//         // Exclude documentation from auth middleware
//         if (!Str::contains($val['path'], 'documentation')) {
//             $route->middleware('auth');
//         }
//     }
// });
//
// // Documentations pages
// Route::prefix('documentation')->group(function () {
//     Route::get('getting-started/references', [ReferencesController::class, 'index']);
//     Route::get('getting-started/changelog', [PagesController::class, 'index']);
// });
//
// Route::middleware('auth')->group(function () {
//     // Account pages
//     Route::prefix('account')->group(function () {
//         Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
//         Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
//         Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
//         Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
//     });
//
//     // Logs pages
//     Route::prefix('log')->name('log.')->group(function () {
//         Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
//         Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
//     });
// });
//
//
// /**
//  * Socialite login using Google service
//  * https://laravel.com/docs/8.x/socialite
//  */
// Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);
//
// require __DIR__.'/auth.php';
