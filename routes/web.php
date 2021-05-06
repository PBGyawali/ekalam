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
Route::get('/news/id=')->name('shownews');
Route::get('/category/showall=')->name('showcategory'); //shows edit post form
Route::get('/',[\App\Http\Controllers\NewsPostController::class, 'all'])->name('allnews');
Route::get('/news/id={newsPost}', [\App\Http\Controllers\NewsPostController::class, 'show']);
Route::get('/category/showall={category_id}', [\App\Http\Controllers\NewsPostController::class, 'category']); //shows edit post form   
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    
    Route::get('/dashboard',[App\Http\Controllers\NewsPostController::class, 'index'])->name('dashboard');
    Route::get('/user',[App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/user/id={user}', [\App\Http\Controllers\UserController::class, 'edit']); //shows edit post form   
    Route::get('/user/add', [\App\Http\Controllers\UserController::class, 'create'])->name('adduser');
    Route::post('/user/add', [\App\Http\Controllers\UserController::class, 'store'])->name('storeuser'); //saves the created post to the databse
    Route::delete('/user/{user}', [\App\Http\Controllers\UserController::class, 'destroy']); //deletes post from the database
    Route::put('/user/id={user}', [\App\Http\Controllers\UserController::class, 'update']); //commits edited post to the database 
    // The route we have created to show all news posts.
    Route::get('/news', [\App\Http\Controllers\NewsPostController::class, 'index'])->name('news');
    
    Route::get('/news/create', [\App\Http\Controllers\NewsPostController::class, 'create'])->name('createnews'); //shows create post form
    Route::post('/news/create', [\App\Http\Controllers\NewsPostController::class, 'store'])->name('storenews'); //saves the created post to the databse
    Route::get('/news/{newsPost}/edit', [\App\Http\Controllers\NewsPostController::class, 'edit']); //shows edit post form
    Route::put('/news/{newsPost}/edit', [\App\Http\Controllers\NewsPostController::class, 'update']); //commits edited post to the database 
    Route::delete('/news/{newsPost}', [\App\Http\Controllers\NewsPostController::class, 'destroy']); //deletes post from the database


       
    Route::get('/category',[App\Http\Controllers\CategoryController::class, 'index'])->name('category');
    Route::get('/category/id={category}', [\App\Http\Controllers\CategoryController::class, 'edit']); //shows edit post form   
    Route::get('/category/add', [\App\Http\Controllers\CategoryController::class, 'create'])->name('addcategory');
    Route::post('/category/add', [\App\Http\Controllers\CategoryController::class, 'store'])->name('storecategory'); //saves the created post to the databse
    Route::delete('/category/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy']); //deletes post from the database
    Route::put('/category/id={category}', [\App\Http\Controllers\CategoryController::class, 'update']); //commits edited post to the database 

    Route::get('/gallery',[App\Http\Controllers\GalleryController::class, 'index'])->name('gallery');
    Route::get('/gallery/id={gallery}', [\App\Http\Controllers\GalleryController::class, 'edit']); //shows edit post form   
    Route::get('/gallery/add', [\App\Http\Controllers\GalleryController::class, 'create'])->name('addgallery');
    Route::post('/gallery/add', [\App\Http\Controllers\GalleryController::class, 'store'])->name('storegallery'); //saves the created post to the databse
    Route::delete('/gallery/{gallery}', [\App\Http\Controllers\GalleryController::class, 'destroy']); //deletes post from the database
    Route::put('/gallery/id={gallery}', [\App\Http\Controllers\GalleryController::class, 'update']); //commits edited post to the datgalle


    Route::get('/advertisement',[App\Http\Controllers\AdvertisementController::class, 'index'])->name('advertisement');
    Route::get('/advertisement/id={advertisement}', [\App\Http\Controllers\AdvertisementController::class, 'edit']); //shows edit post form   
    Route::get('/advertisement/add', [\App\Http\Controllers\AdvertisementController::class, 'create'])->name('addadvertisement');
    Route::post('/advertisement/add', [\App\Http\Controllers\AdvertisementController::class, 'store'])->name('storeadvertisement'); //saves the created post to the databse
    Route::delete('/advertisement/{advertisement}', [\App\Http\Controllers\AdvertisementController::class, 'destroy']); //deletes post from the database
    Route::put('/advertisement/id={advertisement}', [\App\Http\Controllers\AdvertisementController::class, 'update']); //commits edited post to the datgalle
});
