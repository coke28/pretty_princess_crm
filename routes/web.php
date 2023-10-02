<?php

use App\Events\MyEvent;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CrmLogController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserLevelController;
use Illuminate\Support\Facades\Event;

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

// Route::get('/playground',function(){

//   Event::dispatch(new MyEvent());

//   return "Event Dispatched";

// });

Route::middleware('auth')->group(function () {

  // Define your routes here
  Route::group(['prefix' => 'user'], function () {
    //User Routes
    Route::get('/', [PageController::class, 'manageUser'])->name('user.index');
    Route::post('table', [UserController::class, 'userTB'])->name('user.table');
    Route::post('add', [UserController::class, 'userAdd'])->name('user.add');
    Route::get('get/{user}', [UserController::class, 'userGet'])->name('user.get');
    Route::post('edit/{user}', [UserController::class, 'userEdit'])->name('user.edit');
    // Route::post('delete/{user}', [UserController::class, 'userDelete'])->name('admin.user.delete');
  });
  Route::group(['prefix' => 'userLevel'], function () {
    //User Level Routes
    Route::get('/', [PageController::class, 'manageUserLevel'])->name('userLevel.index');
    Route::post('table', [UserLevelController::class, 'userLevelTB'])->name('userLevel.table');
    Route::post('add', [UserLevelController::class, 'userLevelAdd'])->name('userLevel.add');
    Route::get('get/{userLevel}', [UserLevelController::class, 'userLevelGet'])->name('userLevel.get');
    Route::post('edit/{userLevel}', [UserLevelController::class, 'userLevelEdit'])->name('userLevel.edit');
    Route::post('delete/{userLevel}', [UserLevelController::class, 'userLevelDelete'])->name('userLevel.delete');
  });
  Route::group(['prefix' => 'form'], function () {
    //Form Routes
    Route::get('/', [PageController::class, 'manageForm'])->name('form.index');
    Route::post('table', [FormController::class, 'formTB'])->name('form.table');
    Route::post('add', [FormController::class, 'formAdd'])->name('form.add');
    Route::get('get/{form}', [FormController::class, 'formGet'])->name('form.get');
    Route::post('edit/{form}', [FormController::class, 'formEdit'])->name('form.edit');
    Route::post('activeCount', [FormController::class, 'formGetActiveCount'])->name('form.get.activeCount');
    // Route::post('delete/{form}', [FormController::class, 'formDelete'])->name('form.delete');
  });

  Route::group(['prefix' => 'category'], function () {
    //Form Routes
    Route::get('/', [PageController::class, 'manageCategory'])->name('category.index');
    Route::post('table', [CategoryController::class, 'categoryTB'])->name('category.table');
    Route::post('add', [CategoryController::class, 'categoryAdd'])->name('category.add');
    Route::get('get/{category}', [CategoryController::class, 'categoryGet'])->name('category.get');
    Route::post('edit/{category}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::post('delete/{category}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
  });

  Route::group(['prefix' => 'location'], function () {
    //Form Routes
    Route::get('/', [PageController::class, 'manageLocation'])->name('location.index');
    Route::post('table', [LocationController::class, 'locationTB'])->name('location.table');
    Route::post('add', [LocationController::class, 'locationAdd'])->name('location.add');
    Route::get('get/{location}', [LocationController::class, 'locationGet'])->name('location.get');
    Route::post('edit/{location}', [LocationController::class, 'locationEdit'])->name('location.edit');
    Route::post('delete/{location}', [LocationController::class, 'locationDelete'])->name('location.delete');
  });



  Route::group(['prefix' => 'crmLog'], function () {
    //Form Routes
    Route::get('/', [PageController::class, 'manageCrmLog'])->name('crmLog.index');
    Route::post('table', [CrmLogController::class, 'crmLogTB'])->name('crmLog.table');
    Route::post('delete/{crmLog}', [CrmLogController::class, 'crmLogDelete'])->name('crmLog.delete');
  });

  Route::group(['prefix' => 'upload'], function () {
    //Form Routes
    Route::get('/', [PageController::class, 'uploadIndex'])->name('upload.index');
    Route::post('/', [UploadController::class, 'queueFile'])->name('upload.queue');
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
