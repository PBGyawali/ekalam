<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsPostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\VideoController;

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




Route::post('/',[NewsPostController::class, 'state']);




Route::group([ 'middleware' => ['variable']], function () {
    Route::get('/career', function () {         return view('carreer');})->name('career');
    Route::get('/ad', function () {             return view('ad');})->name('ad');
    Route::get('/aboutus', function () {        return view('aboutus');})->name('about');
    Route::get('/contactus', function () {      return view('contacts');})->name('contacts');
    Route::get('/support', function () {        return view('support');})->name('support');
    Route::get('/privacy', function () {        return view('privacy');})->name('privacy');
    Route::get('/news/id={id}', [NewsPostController::class, 'show'])->name('singlenews');
    Route::get('/search/', [NewsPostController::class, 'search'])->name('search');
    Route::get('/',[NewsPostController::class, 'all'])->name('allnews');
    Route::get('/category/showall={category_id}', [NewsPostController::class, 'category'])->name('categorynews');
});




Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::get('/dashboard',[NewsPostController::class, 'index'])->name('dashboard');
    Route::get('/user',[UserController::class, 'index'])->name('user');
    Route::get('/user/id={user}', [UserController::class, 'edit']); //shows edit post form
    Route::get('/user/add', [UserController::class, 'create'])->name('adduser');
    Route::post('/user/add', [UserController::class, 'store'])->name('storeuser'); //saves the created post to the databse
    Route::delete('/user/{user}', [UserController::class, 'destroy']); //deletes post from the database
    Route::put('/user/id={user}', [UserController::class, 'update']); //commits edited post to the database
    // The route we have created to show all news posts.
    Route::get('/news', [NewsPostController::class, 'index'])->name('news');

    Route::get('/news/create', [NewsPostController::class, 'create'])->name('createnews'); //shows create post form
    Route::post('/news/create', [NewsPostController::class, 'store'])->name('storenews'); //saves the created post to the databse
    Route::get('/news/{newsPost}/edit', [NewsPostController::class, 'edit']); //shows edit post form
    Route::put('/news/{newsPost}/edit', [NewsPostController::class, 'update']); //commits edited post to the database
    Route::delete('/news/{newsPost}', [NewsPostController::class, 'destroy']); //deletes post from the database



    Route::get('/category',[CategoryController::class, 'index'])->name('category');
    Route::get('/category/id={category}', [CategoryController::class, 'edit']); //shows edit post form
    Route::get('/category/add', [CategoryController::class, 'create'])->name('addcategory');
    Route::post('/category/add', [CategoryController::class, 'store'])->name('storecategory'); //saves the created post to the databse
    Route::delete('/category/{category}', [CategoryController::class, 'destroy']); //deletes post from the database
    Route::put('/category/id={category}', [CategoryController::class, 'update']); //commits edited post to the database

    Route::get('/gallery',[GalleryController::class, 'index'])->name('gallery');
    Route::get('/gallery/id={gallery}', [GalleryController::class, 'edit']); //shows edit post form
    Route::get('/gallery/add', [GalleryController::class, 'create'])->name('addgallery');
    Route::post('/gallery/add', [GalleryController::class, 'store'])->name('storegallery'); //saves the created post to the databse
    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy']); //deletes post from the database
    Route::put('/gallery/id={gallery}', [GalleryController::class, 'update']); //commits edited post to the datgalle


    Route::get('/advertisement',[AdvertisementController::class, 'index'])->name('advertisement');
    Route::get('/advertisement/id={advertisement}', [AdvertisementController::class, 'edit']); //shows edit post form
    Route::get('/advertisement/add', [AdvertisementController::class, 'create'])->name('addadvertisement');
    Route::post('/advertisement/add', [AdvertisementController::class, 'store'])->name('storeadvertisement'); //saves the created post to the databse
    Route::delete('/advertisement/{advertisement}', [AdvertisementController::class, 'destroy']); //deletes post from the database
    Route::put('/advertisement/id={advertisement}', [AdvertisementController::class, 'update']); //commits edited post to the datgalle


    Route::get('/video',[VideoController::class, 'index'])->name('video');
    Route::get('/video/id={video}', [VideoController::class, 'edit']); //shows edit post form
    Route::get('/video/add', [VideoController::class, 'create'])->name('addvideo');
    Route::post('/video/add', [VideoController::class, 'store'])->name('storevideo'); //saves the created post to the databse
    Route::delete('/video/{video}', [VideoController::class, 'destroy']); //deletes post from the database
    Route::put('/video/id={video}', [VideoController::class, 'update']); //commits edited post to the datgalle
});
