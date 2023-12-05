<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CarousalController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\MessageController;
use App\Http\Controllers\User\UserServiceController;
use App\Http\Controllers\User\AboutController;
use App\Http\Livewire\Carousel;


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


Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    
    Auth::routes();

    Route::get('/' , [WelcomeController::class , 'welcome'])->name('welcome');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/services', [UserServiceController::class, 'services'])->name('services');
    Route::get('/contact-us' , [ContactController::class , 'contactUs'])->name('contact-us');
    Route::get('/about-us' , [AboutController::class , 'aboutUs'])->name('about-us');
    Livewire::component('carousel' , Carousal::class);



    Route::middleware(['web', 'auth'])->group(function () {
    Route::get('items' , [PageController::class , 'viewData'])->name('viewdata');
    Route::POST('additem' , [PageController::class , 'storeData'])->name('storedata');
    Route::get('deleteitem/{id}' , [PageController::class , 'deleteEntry'])->name('deleteitem');
    Route::get('edit/{id}' , [PageController::class , 'editData'])->name('editdata');
    Route::POST('update/{id}', [PageController::class , 'updateData'])->name('updatedata');
    });

    Route::prefix('admin')->middleware('auth')->group(function() {
        Route::get('/index' , [AdminController::class , 'index'])->name('admin-index');
        Route::get('/dashboard' , [AdminController::class , 'dashboard'])->name('admin-dashboard');
        Route::get('/widgets' , [AdminController::class , 'widgets'])->name('admin-widgets');
        Route::get('/charts' , [AdminController::class , 'charts'])->name('admin-charts');
        Route::get('/forms' , [AdminController::class , 'forms'])->name('admin-forms');
        Route::get('/Permission' , [AdminController::class , 'permission'])->name('admin-permission');


        Route::get('/users' , [UserController::class , 'viewUsers'])->name('viewusers');
        Route::get('/adduser' , [UserController::class , 'addUser'])->name('adduser');
        Route::POST('/adduser' , [UserController::class , 'storeUser'])->name('storeuser');
        Route::get('/delete-user/{id}' , [UserController::class , 'deleteUser'])->name('deleteuser');
        Route::get('/edit-user/{id}' , [UserController::class , 'editUsers'])->name('editusers');
        Route::POST('/update-user/{id}' , [UserController::class , 'updateUser'])->name('updateuser');


        Route::get('/additem', [ItemController::class , 'addItem'])->name('admin-additem');
        Route::POST('/additem', [ItemController::class , 'storeItem'])->name('admin-storeitem');
        Route::get('/items', [ItemController::class , 'userItems'])->name('useritem');
        Route::get('/deleteitems/{id}', [ItemController::class , 'deleteItems'])->name('delete-item');
        Route::get('/edititems/{id}', [ItemController::class , 'editItems'])->name('admin-edititem');
        Route::POST('/edititems/{id}', [ItemController::class , 'updateItems'])->name('admin-updateitem');



        Route::get('/create', [RoleController::class , 'create'])->name('create-role');
        Route::POST('/store' , [RoleController::class , 'storeRole'])->name('store-role');
        Route::get('/role' , [RoleController::class , 'viewRole'])->name('view-role');
        Route::get('/delete/{id}' , [RoleController::class , 'deleteRole'])->name('delete-role');
        Route::get('/edit/{id}' , [RoleController::class , 'editRole'])->name('edit-role');
        Route::POST('/update/{id}' , [RoleController::class , 'updateRole'])->name('update-role');
        Route::get('/view/{id}' , [RoleController::class , 'viewPermission'])->name('view-permission');

     
        Route::get('/profile/{id}', [ProfileController::class, 'profile'])->name('profile');
        Route::POST('/update-profile/{id}' , [ProfileController::class , 'updateProfile'])->name('update-profile');
        Route::get('/carousal-create' , [CarousalController::class , 'create'])->name('carousal-create');
        Route::POST('/carousal' , [CarousalController::class , 'storeCarousal'])->name('carousal-store');
        Route::get('carousal-delete/{id}' , [CarousalController::class , 'deleteCarousal'])->name('carousal-delete');
        Route::get('carousal-edit/{id}' , [CarousalController::class , 'editCarousal'])->name('carousal-edit');
        Route::POST('/carousal-update/{id}' , [CarousalController::class , 'updateCarousal'])->name('carousal-update');

        Route::get('/create-slider' , [CarousalController::class , 'createSlider'])->name('create-slider');
        Route::POST('/slider-store' , [CarousalController::class , 'storeSlider'])->name('slider-store');
        Route::get('/slider-delete/{slider_id}' , [CarousalController::class , 'deleteSlider'])->name('delete-slider');
        Route::get('/slider-edit/{slider_id}' , [CarousalController::class , 'editSlider'])->name('slider-edit');
        Route::POST('/update-slider/{slider_id}' , [CarousalController::class , 'updateSlider'])->name('update-slider');



        Route::get('/create-slide' , [CarousalController::class , 'createSlide'])->name('create-slide');
        Route::POST('/store-slide' , [CarousalController::class , 'storeSlide'])->name('store-slide');
        Route::get('/delete-slide/{slide_id}' , [CarousalController::class , 'deleteSlide'])->name('delete-slide');
        Route::get('/edit-slides/{id}' , [CarousalController::class , 'editSlide'])->name('edit-slide');
        Route::POST('/update-slides/{id}' , [CarousalController::class , 'updateSlide'])->name('update-slide');


        Route::get('/favicon' , [ProfileController::class , 'favIcon'])->name('favicon');
        Route::POST('/add-favicon' , [ProfileController::class , 'addFavicon'])->name('add-favicon');
        Route::get('/delete-favicon/{id}' , [ProfileController::class , 'delFavicon'])->name('delete-favicon');
        Route::get('/edit-favicon/{id}' , [ProfileController::class , 'editFavicon'])->name('edit-favicon');
        Route::POST('/update-favicon/{id}' , [ProfileController::class , 'updateFavicon'])->name('update-favicon');


        Route::get('/slider-page' , [CarousalController::class , 'sliderPage'])->name('slider-page');
        Route::POST('/page-store' , [CarousalController::class , 'pageStore'])->name('page-store');
        Route::get('/page-del/{id}' , [CarousalController::class , 'pageDel'])->name('page-delete');
        Route::get('/page-edit/{id}' , [CarousalController::class , 'PageEdit'])->name('page-edit');
        Route::POST('/update-page/{id}' , [CarousalController::class , 'updatePage'])->name('update-page');

        Route::get('/logo' , [ProfileController::class , 'createLogo'])->name('create-logo');
        Route::POST('/add-logo' , [ProfileController::class , 'saveLogo'])->name('add-logo');

        Route::get('/create-team' , [TeamController::class , 'teamCreate'])->name('create-team');
        Route::POST('/store-teams' , [TeamController::class , 'teamStore'])->name('store-teams');
        Route::get('edit-team/{id}' , [TeamController::class , 'teamEdit'])->name('edit-team');
        Route::POST('update-teams/{id}' , [TeamController::class , 'teamUpdate'])->name('update-teams');
        Route::get('delete-team/{id}' , [TeamController::class , 'teamDelete'])->name('delete-team');

        Route::get('/create-services' , [ServiceController::class , 'createService'])->name('create-service');
        Route::POST('/store-services' , [ServiceController::class , 'storeService'])->name('store-service');
        Route::get('/edit-service/{id}' , [ServiceController::class , 'editService'])->name('edit-service');
        Route::POST('/update-service/{id}' , [ServiceController::class , 'updateService'])->name('update-service');
        Route::get('/delete-service/{id}' , [ServiceController::class , 'deleteService'])->name('delete-service');


        Route::POST('/message-store' , [MessageController::class , 'messageStore'])->name('message-store');


        Route::get('/view-contact' , [ContactController::class , 'viewContact'])->name('view-contact');
        Route::POST('/store-contact' , [ContactController::class , 'storeContact'])->name('store-contact');
        Route::get('/edit-contact/{contact_id}' , [ContactController::class , 'editContact'])->name('edit-contact');
        Route::POST('/update-contact/{contact_id}' , [ContactController::class , 'updateContact'])->name('update-contact');


    })->middleware('IsadminMiddleware');


        
       
});

