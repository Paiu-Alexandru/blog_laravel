<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profile;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

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
    $brands = DB::table('brands')->get();
    $sliders = DB::table('sliders')->get();
    $about = DB::table('abouts')->latest()->first();//GET Last id from database    When We take last data we don't need to foreach it
    //$about = DB::table('abouts')->first();// GET first id from database
    $portfolio = DB::table('new_in_brands')->get();
    $allBrand = DB::table('brands')->orderBy('brand_name')->get();
    return view('home', compact('brands','sliders','about', 'allBrand', 'portfolio'));
});

//Change Password and User Profile route
Route::controller(Profile::class)->group(function(){
    Route::get('user/password/','changePass')->name('change.password');
    Route::post('update/password/','updatePass')->name('update.password');
    Route::get('user/profile/','userProfile')->name('update.profile');
    Route::post('update/profile/','updateProfile')->name('update.user.profile');
});

//Logout from dashboard
Route::get('user/logout/',[LoginController::class, 'userLogout'])->name('user.logout');
//Logout from user interface
//Route::get('/',[LoginController::class, 'interfaceLogout'])->name('interface.logout');


//Brand Route
Route::controller(BrandController::class)->group(function ()
{
    Route::get('brand/','allBrand')->name('brands');
    Route::post('add/brand/','storeBrand')->name('store.brand');
    Route::get('brand/edit/{id}', 'edit');
    Route::post('brand/update/{id}','update');
    Route::get('soft/delete/{id}', 'softdelete');
    Route::get('brand/restore/{id}',  'restore');
    Route::get('brand/delete/{id}', 'delete');

    Route::get('new/in/brand/','newInBrand')->name('new.in.brands');
    Route::post('new/in/brand/add','storeNewInBrand')->name('store.new.in.brands');
    Route::get('new/in/brand/delete/{id}','deletenewInBrand');
    Route::get('portfolio/page','portfolioPage');


});

//Sliders Route
Route::controller(HomeController::class)->group(function ()
{
    Route::get('dashboard/slider','homeSlider')->name('home.slider');
    Route::get('dashboard/add/slider','addSlider')->name('add.slider');
    Route::post('dashboard/store/sliders','storeSliders')->name('store.sliders');
    Route::get('slider/edit/{id}', 'editSlider');
    Route::post('update/slider/{id}', 'updatetSlider');
    Route::get('slider/delete/{id}', 'deleteSlider');

});

//About Route
Route::controller(AboutController::class)->group(function ()
{
    Route::get('about/page','aboutPage');
    Route::get('dashboard/about','homeAbout')->name('home.about');
    Route::get('dashboard/add/about','addAbout')->name('add.about');
    Route::post('dashboard/store/about','storeAbout')->name('store.about');
    Route::get('about/edit/{id}', 'editPage');
    Route::post('about/update/{id}', 'updateAbout');
    Route::get('about/delete/{id}', 'deleteAbout');
});


//Admin Contact Route
Route::controller(ContactController::class)->group(function ()
{
    Route::get('admin/contact/','adminContact')->name('admin.contact');
    Route::get('dashboard/add/contact','addContact')->name('add.contact');
    Route::post('dashboard/store/contact','storeContac')->name('store.contact');
    Route::get('contact/edit/{id}', 'editPage');
    Route::post('contact/update/{id}', 'updateContact');
    Route::get('contact/delete/{id}', 'deleteContact');
    Route::get('contact/','contactPage')->name('contact');
    Route::post('contact/form/','contactForm')->name('contact.form');
    Route::get('dashboard/message','adminMessage')->name('admin.message');
    Route::get('dashboard/message/delete/{id}', 'deleteMessage');

});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //$users = User::all(); //Eloquent ORM version
    //$users = DB::table('users')->get();//Query builder version ('users') is table name in database
    return view('admin.dashboard.admin_master');
})->name('dashboard');
