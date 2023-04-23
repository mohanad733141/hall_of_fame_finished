<?php

use App\Http\Controllers\AdminProjectsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HallOfFameController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\UserProjectController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\OtherProjectsController;

use Illuminate\Support\Facades\Auth;

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


//Route::get('/', 'HomePageController@index');
//Route::get('/Halloffame', 'ProjectsController@index');

Route::get('/', [HomePageController::class, 'index'])->name('homepage');



Route::get('/other', [OtherProjectsController::class, 'index'])->name('others.index');
Route::get('/other/search', [OtherProjectsController::class, 'search'])->name('others.search');

Route::get('/Halloffame', [HallOfFameController::class, 'index'])->name('Halloffame.index');
Route::get('/Halloffame/search', [HallOfFameController::class, 'search'])->name('Halloffame.search');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//admin pages
Route::prefix('admin')->middleware('auth','AdminCheck')->group(function(){
    Route::get('/project/create', [AdminProjectsController::class, 'create'])->name('admin.project.create');
    Route::get('/project/message', [MessagesController::class, 'index'])->name('admin.project.message');
    Route::post('/project/store', [AdminProjectsController::class, 'store'])->name('admin.project.store');
    Route::get('/project/index', [AdminProjectsController::class, 'index'])->name('admin.project.index');
    Route::get('/project/edit/{id}', [AdminProjectsController::class, 'edit'])->name('admin.project.edit');
    Route::post('/project/update/{id}', [AdminProjectsController::class, 'update'])->name('admin.project.update');
    Route::delete('/project/delete/{id}', [AdminProjectsController::class, 'destroy'])->name('admin.project.destroy');
    Route::delete('/project/message/delete/{id}', [MessagesController::class, 'destroy'])->name('admin.message.destroy');

    Route::get('/project/search', [AdminProjectsController::class, 'search'])->name('admin.project.search');
    Route::get('/project/message/search', [MessagesController::class, 'search'])->name('admin.message.search');

    Route::get('/project/index/cards', [AdminProjectsController::class, 'adminStatistics'])->name('admin.project.cards');

    //announcement
    Route::post('/project/announcement/store', [AnnouncementsController::class, 'store'])->name('admin.project.announcement.store');
    Route::get('/project/announcement/edit/{id}', [AnnouncementsController::class, 'edit'])->name('admin.project.announcement.edit');
    Route::post('/project/announcement/update/{id}', [AnnouncementsController::class, 'update'])->name('admin.project.announcement.update');
    Route::delete('/project/announcement/delete/{id}', [AnnouncementsController::class, 'destroy'])->name('admin.project.announcement.destroy');
    Route::get('/project/announcement/search', [AnnouncementsController::class, 'search'])->name('admin.project.announcement.search');

    //user
    Route::get('/project/user', [AdminProjectsController::class, 'allUsers'])->name('admin.users');
    Route::get('/project/user/{id}', [AdminProjectsController::class, 'MakeUserAdmin'])->name('admin.addAdmin');
    Route::delete('/project/user/delete/{id}', [AdminProjectsController::class, 'deleteUser'])->name('admin.user.destroy');

    Route::get('/project/user/users/search', [AdminProjectsController::class, 'searchUser'])->name('admin.user.search');
    ////admin announcement
    Route::get('/project/announcement', [AnnouncementsController::class, 'index'])->name('admin.project.announcement');

      
    Route::delete('/contactus/delete', [MessagesController::class, 'destroy'])->name('contactus.store.destroy');
});

Route::get('/project/downloadfile/{id}', [AdminProjectsController::class, 'downloadfile'])->name('admin.project.downloadfile');
Route::get('/admin/project/detail/{id}', [AdminProjectsController::class, 'detail'])->name('admin.project.detail');



////contact us form
Route::get('/contactus', [MessagesController::class, 'create'])->name('contactus');
Route::post('/contactus/store', [MessagesController::class, 'store'])->name('contactus.store');



//users page
Route::prefix('user')->middleware('auth')->group(function(){
Route::get('/project/index', [UserProjectController::class, 'index'])->name('user.project.index');
Route::post('/project/store', [UserProjectController::class, 'store'])->name('user.project.store');
Route::get('/project/edit/{id}', [UserProjectController::class, 'edit'])->name('user.project.edit');
Route::get('/project/downloadfile/{id}', [UserProjectController::class, 'downloadfile'])->name('user.project.downloadfile');
Route::post('/project/update/{id}', [UserProjectController::class, 'update'])->name('user.project.update');
Route::delete('/project/delete/{id}', [UserProjectController::class, 'destroy'])->name('user.project.destroy');
});
