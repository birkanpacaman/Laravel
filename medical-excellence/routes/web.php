<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;

// ----- Home
Route::controller (HomePageController::class)->group (function () {
	Route::get ('/', 'index')->name ('index');
	Route::post ('/', 'consulation_store')->name ('consulation_store');
});