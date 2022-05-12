<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/feedback', function () {
    return view('feedback');
});

Route::get('/examples', function () {
    return view('examples');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/test', function () {
    return view('test');
});
