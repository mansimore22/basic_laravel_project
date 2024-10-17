<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PracticeController;

/*
|--------------------------------------------------------------------------
| Web Routes
*/
Route::get('/', function () {
    return view('welcome');
});
// Country Route
route::get('country/index',[CountryController::class,'index'])->name('countrylist');
route::get('country/create',[CountryController::class,'create'])->name('countrycreate');
route::post('country/store',[CountryController::class,'store'])->name('countrystore');
route::get('country/edit/{id}',[CountryController::class,'edit'])->name('countryedit');
route::post('country/update/{id}',[CountryController::class,'update'])->name('countryupdate');
route::get('country/delete/{id}',[CountryController::class,'destroy'])->name('countrydelete');
// State Route
route::get('state/index',[StateController::class,'index'])->name('statelist');
route::get('state/create',[StateController::class,'create'])->name('statecreate');
route::post('state/store',[StateController::class,'store'])->name('statestore');
route::get('state/edit/{id}',[StateController::class,'edit'])->name('stateedit');
route::post('state/update/{id}',[StateController::class,'update'])->name('stateupdate');
route::get('state/delete/{id}',[StateController::class,'destroy'])->name('statedelete');
// City Route
route::get('city/index',[CityController::class,'index'])->name('citylist');
route::get('city/create',[CityController::class,'create'])->name('citycreate');
route::post('city/store',[CityController::class,'store'])->name('citystore');
route::get('city/edit/{id}',[CityController::class,'edit'])->name('cityedit');
route::post('city/update/{id}',[CityController::class,'update'])->name('cityupdate');
route::get('city/delete/{id}',[CityController::class,'destroy'])->name('citydelete');
// Route for getting states dynamically based on selected country
Route::get('states/{country_id}', [CityController::class, 'getStates'])->name('getStates');
// User Route
route::get('user/index',[UserController::class,'index'])->name('userlist');
route::get('user/create',[UserController::class,'create'])->name('usercreate');
route::post('user/store',[UserController::class,'store'])->name('userstore');
route::get('user/edit/{id}',[UserController::class,'edit'])->name('useredit');
route::post('user/update/{id}',[UserController::class,'update'])->name('userupdate');
route::get('user/delete/{id}',[UserController::class,'destroy'])->name('userdelete');
// Practice route
route::get('practice/index',[PracticeController::class,'index'])->name('practicelist');
route::get('practice/create',[PracticeController::class,'create'])->name('practicecreate');
route::post('practice/store',[PracticeController::class,'store'])->name('practicestore');
route::get('practice/edit/{id}',[PracticeController::class,'edit'])->name('practiceedit');
route::post('practice/update/{id}',[PracticeController::class,'update'])->name('practiceupdate');
route::get('practice/delete/{id}',[PracticeController::class,'destroy'])->name('practicedelete');