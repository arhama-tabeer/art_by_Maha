<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/popular', function () {
    return view('popular');
});

Route::get('/abstract', function () {
    return view('abstract');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/feedback', function () {
    return view('feedback');
});
