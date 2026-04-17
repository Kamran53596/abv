<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

require __DIR__.'/admin.php';

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localizationRedirect', 'localize'] ], function() {
    //Route::get(LaravelLocalization::transRoute('routes.home'), [HomeController::class, 'index'])->name('home');

    //Auth
    //require __DIR__.'/auth.php';
    
    
});
