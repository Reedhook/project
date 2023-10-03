<?php


use App\Http\Controllers\Admin\Category\CategoryAdminController;
use App\Http\Controllers\Admin\Post\PostAdminController;
use App\Http\Controllers\Admin\Tag\TagAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::name('admin.')->group(function () {

        Route::namespace('Main')->group(function () {
            Route::get('/', 'IndexController')->name('main.index');
        });

        Route::group(['prefix' => 'categories', 'controller' => CategoryAdminController::class], function () {
            Route::name('category.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{category}/show', 'show')->name('show');
                Route::get('/{category}/edit', 'edit')->name('edit');
                Route::patch('/{category}', 'update')->name('update');
                Route::delete('/{category}', 'delete')->name('delete');
            });
        });
        Route::group(['prefix' => 'tags', 'controller' => TagAdminController::class], function () {
            Route::name('tag.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{tag}/show', 'show')->name('show');
                Route::get('/{tag}/edit', 'edit')->name('edit');
                Route::patch('/{tag}', 'update')->name('update');
                Route::delete('/{tag}', 'delete')->name('delete');
            });
        });
        Route::group(['prefix' => 'posts', 'controller' => PostAdminController::class], function () {
            Route::name('post.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{post}/show', 'show')->name('show');
                Route::get('/{post}/edit', 'edit')->name('edit');
                Route::patch('/{post}', 'update')->name('update');
                Route::delete('/{post}', 'delete')->name('delete');
            });
        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
