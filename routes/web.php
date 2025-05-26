<?php // routes/web.php
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('pages.posts.index-page'); 
})->name('post.index');

Route::get('/create', function () {
    return view('pages.posts.create'); 
})->name('post.create'); 
Route::get('/edit/{id}', function ($id) {
    return view('pages.posts.edit-form', ['postId' => $id]);
})->name('post.edit');