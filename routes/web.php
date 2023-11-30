<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InfiniteSurveyController;
use App\Http\Controllers\DropdownController;

//use App\Http\Middleware\checksession;

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

//********************Applight********************/

Route::get('/', function () {
    return view('applight.index');
});

// ****************************Project-1****************


// **************************Product********************/
Route::get('/showpage',[ProductController::class,'create']);
Route::post('/register',[ProductController::class,'storeinfo']);

// **************************Login**********************/
Route::get('/showloginpage', [ProductController::class, 'showloginpage']);
Route::post('/login',[ProductController::class,'login']);

// **************************Logout**********************/
Route::get('/logout',[ProductController::class,'logout']);

// **************************Product Store Functionality******/
Route::post('/storeproduct',[ProductController::class,'store']);

// **************************Product List*********************/
Route::get('/showlist',[ProductController::class,'showlist'])->middleware('guard');
Route::get('/addproduct', [ProductController::class, 'addproduct'])->middleware('guard');

// **************************Edit Product*********************/
Route::get('/edit/{id}',[ProductController::class,'edit']);

// **************************Update Product*******************/
Route::put('/edit/update/{id}', [ProductController::class, 'update']);

// **************************Product Trash Functionality******/
Route::get('/trash/{id}',[ProductController::class,'trash']);

// **************************Product Recycle Functionality*****/
Route::get('/recycle_bin',[ProductController::class,'undo']);

// **************************Product Restore Functionality*****/
Route::get('/restore/{id}',[ProductController::class,'restore']);

// **************************Product Delete Functionality*****/
Route::get('/delete/{id}',[ProductController::class,'delete']);


// ****************************Project-2**********************


// **************************infinite earth survey Admin******/
Route::get('/admin', [InfiniteSurveyController::class, 'admin'])->name('admin');

// **************************infinite Survey Registeration****/
Route::get('/infinite_register', [InfiniteSurveyController::class, 'infinite_register']);
Route::post('/store_register', [InfiniteSurveyController::class, 'store_register']);

// **************************infinite Survey Login************/
Route::get('/infinite_login', [InfiniteSurveyController::class, 'infinite_login']);
Route::post('/store_login', [InfiniteSurveyController::class, 'store_login'])->name('store_login');

// **************************infinite Survey Logout***********/
Route::get('/infinite_logout',[InfiniteSurveyController::class,'infinite_logout']);

//***************************Beneficiary data*****************/
Route::get('/beneficiary_form', [InfiniteSurveyController::class, 'beneficiary_form']);
Route::post('/store_beneficiary_data', [InfiniteSurveyController::class, 'store_beneficiary_data']);
Route::get('/edit_beneficiary/{id}',[InfiniteSurveyController::class,'edit_beneficiary']);
Route::put('/edit_beneficiary/update_beneficiary/{id}', [InfiniteSurveyController::class,'update_beneficiary']);
Route::put('/accept_beneficiary/{id}', [InfiniteSurveyController::class, 'accept_beneficiary'])->name('accept_beneficiary');
Route::put('/reject_beneficiary/{id}', [InfiniteSurveyController::class, 'reject_beneficiary'])->name('reject_beneficiary');
Route::get('/beneficiary_pending', [InfiniteSurveyController::class, 'beneficiary_pending'])->name('beneficiary_pending');
Route::get('/beneficiary_accept', [InfiniteSurveyController::class, 'beneficiary_accept'])->name('beneficiary_accept');
Route::get('/beneficiary_reject', [InfiniteSurveyController::class, 'beneficiary_reject'])->name('beneficiary_reject');

//***************************Baseline information*************/
Route::get('/baseline_info_form', [InfiniteSurveyController::class, 'baseline_info_form']);
Route::post('/store_baseline_data', [InfiniteSurveyController::class, 'store_baseline_info_data']);
Route::get('/edit_baseline/{id}',[InfiniteSurveyController::class,'edit_baseline']);
Route::put('/edit_baseline/update_baseline/{id}', [InfiniteSurveyController::class,'update_baseline']);
Route::put('/accept_baseline/{id}', [InfiniteSurveyController::class, 'accept_baseline'])->name('accept_baseline');
Route::put('/reject_baseline/{id}', [InfiniteSurveyController::class, 'reject_baseline'])->name('reject_baseline');
Route::get('/baseline_pending', [InfiniteSurveyController::class, 'baseline_pending'])->name('baseline_pending');
Route::get('/baseline_accept', [InfiniteSurveyController::class, 'baseline_accept'])->name('baseline_accept');
Route::get('/baseline_reject', [InfiniteSurveyController::class, 'baseline_reject'])->name('baseline_reject');

//***************************Ujwala Scheme********************/
Route::get('/ujwala_scheme_form', [InfiniteSurveyController::class, 'ujwala_scheme_form']);
Route::post('/store_ujwala_data', [InfiniteSurveyController::class, 'store_ujwala_data']);
Route::get('/edit_ujwala/{id}',[InfiniteSurveyController::class,'edit_ujwala']);
Route::put('/edit_ujwala/update_ujwala/{id}', [InfiniteSurveyController::class,'update_ujwala']);
Route::put('/accept_ujwala/{id}', [InfiniteSurveyController::class, 'accept_ujwala'])->name('accept_ujwala');
Route::put('/reject_ujwala/{id}', [InfiniteSurveyController::class, 'reject_ujwala'])->name('reject_ujwala');
Route::get('/ujwala_pending', [InfiniteSurveyController::class, 'ujwala_pending'])->name('ujwala_pending');
Route::get('/ujwala_accept', [InfiniteSurveyController::class, 'ujwala_accept'])->name('ujwala_accept');
Route::get('/ujwala_reject', [InfiniteSurveyController::class, 'ujwala_reject'])->name('ujwala_reject');

//**************************Survey Form************************/
Route::get('survey_datalist/{id}', [InfiniteSurveyController::class, 'showlist'])->name('survey_datalist');

//**************************Tables Data List*******************/
Route::get('/infinite_tables', [InfiniteSurveyController::class, 'infinite_tables']);
Route::get('/show_beneficiary_data', [InfiniteSurveyController::class, 'show_beneficiary_data'])->name('show_beneficiary_data');
Route::get('/show_baseline_data', [InfiniteSurveyController::class, 'show_baseline_data'])->name('show_baseline_data');
Route::get('/show_ujwala_data', [InfiniteSurveyController::class, 'show_ujwala_data'])->name('show_ujwala_data');

//**************************Dependent dropdown*****************/
Route::get('/dependent_dropdown', function () {
    return view('dropdown');
});
Route::get('/dropdown', [DropdownController::class, 'index']);
Route::post('/api/fetch-states', [DropdownController::class, 'fetchState']);
Route::post('/api/fetch-cities', [DropdownController::class, 'fetchCity']);