<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostController;

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



/*
|--------------------------------------------------------------------------
|   VIEW PAGES
|--------------------------------------------------------------------------
*/

/* This middleware below redirects to /home/user when ongoing session wants to go to /home url*/
Route::view("/home", "homepage")->middleware('alreadyLoggedIn');

/*Views blog page using /home/blogs url*/
Route::view("/home/blogs", "blogs");

/*Views about page using /home/about url*/
Route::view("/home/about", "about");



/*
|--------------------------------------------------------------------------
|   GETTING FUNCTION PAGES
|--------------------------------------------------------------------------
*/

/*Home page with user access data*/
Route::get("/home/user", [AccountController::class, 'home']);

/*Account page with user access data*/
Route::get("/home/user/account", [AccountController::class, 'account']);

/*Blogs page with user access data*/
Route::get("/home/blogs", [AccountController::class, 'blogs']);

/*About page with user access data*/
Route::get("/home/about", [AccountController::class, 'about']);



/*
|--------------------------------------------------------------------------
|   LOGIN ANG LOGOUT PAGES WITH GET AND POST METHODS
|--------------------------------------------------------------------------
*/

/*Login view with middleware for checking login session.*/
Route::get("/home/login", [AccountController::class,'login'])->middleware('alreadyLoggedIn');

/*Login user with directed path name for efficient use by route method in login page.*/
Route::post("/home/login-user", [AccountController::class,'loginUser'])->name('login-user');

/*Logout user*/
Route::get("/home/logout", [AccountController::class, 'logout']);

/*Logout due to expired session*/
Route::get("/home/expiredsession", [AccountController::class, 'logoutAuto']);



/*
|--------------------------------------------------------------------------
|   REGISTRATION PAGES WITH GET AND POST METHODS
|--------------------------------------------------------------------------
*/

/*Registration view with middleware for checking login session.*/
Route::get("/home/registration", [AccountController::class,'registration'])->middleware('alreadyLoggedIn');

/*Register user view with directed path name for efficient use by route method in register page.*/
Route::post("/home/register-user", [AccountController::class,'registerUser'])->name('register-user');



/*
|--------------------------------------------------------------------------
|   UNDER CONSTRUCTION
|--------------------------------------------------------------------------
*/


/*Get and Post Forms*/
Route::get("/create-post", [PostController::class,'createPost'])->name('post.create');
Route::post("/create-post", [PostController::class,'savePost'])->name('post.save');



