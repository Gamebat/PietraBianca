<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
return view('home');
});

Route::get('/feedback', function () {
    return view('feedback');
});

Route::post('/feedback', 'App\Http\Controllers\FeedbackController@upload')->name('image-upload');

Route::post('/feedback/send', 'App\Http\Controllers\FeedbackController@send')->name('form-send');

Route::get('/feedback', 'App\Http\Controllers\FeedbackController@allData');

Route::get('/feedback/test', 'App\Http\Controllers\FeedbackController@test');

Route::get('/examples', function () {
    return view('examples');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/catalog', 'App\Http\Controllers\CatalogController@allData');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
