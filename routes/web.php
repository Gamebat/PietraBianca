<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
return view('home');
})->name('home');
// Route::get('/feedback', function () {
//     return view('feedback');
// })->middleware('auth');

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

Route::name('user.')->group(function(){
    Route::view('/orders', 'orders')->middleware('auth')->name('orders');

    Route::get('/login', function(){
        if(Auth::check()){
            return redirect(route('user.orders'));
        }
        return view('auth/login');
    })->name('login');

    Route::post('/login', [App\Http\Controllers\LoginController::class, 'login']);

    Route::get('/logout',function(){
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/registration',function(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('auth/registration');
    })->name('registration');

    Route::post('/registration', [App\Http\Controllers\RegisterController::class, 'save']);
});


