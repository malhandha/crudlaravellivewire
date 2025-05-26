<?php // routes/web.php
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Post\Index; // Jika masih digunakan
// use App\Http\Livewire\Post\Create; // Tidak perlu di-import jika tidak untuk Full Page Component
use App\Http\Livewire\Post\Edit; // Jika masih digunakan
Route::get('/', function () {
    return view('pages.posts.index-page'); // Mengarah ke view halaman baru
})->name('post.index');

Route::get('/create', function () {
    return view('pages.posts.create'); // Sesuaikan dengan nama file view halaman Anda
})->name('post.create'); // Nama route bisa tetap sama

Route::get('/edit/{id}', function ($id) {
    return view('pages.posts.edit-form', ['postId' => $id]); // Kirim $id sebagai $postId ke view halaman
})->name('post.edit');