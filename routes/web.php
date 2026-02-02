<?php
use App\Http\Controllers\PostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
// class Post untuk datanya
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\ContactController;


// // tidak bisa kirim data
// Route::view('/','pages.beranda');

Route::get('/', function () {
    return view('pages.beranda', ['title' => 'Beranda']);
});
Route::get('/contact', function () {
    return view('pages.contact', ['title' => 'Contact']);
});

Route::get('/about', function () {
    $data = [
        "title" => 'About',
        'nama' => 'Diaz',
        'pekerjaan' => 'Programmer',
        'alamat' => 'Indonesia'
    ];
    // mengirimkan data ke view
    return view('pages.about', $data);
});

// Page blog utama 
Route::get('/posts', [PostController::class, 'index']);

// Page single post
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

// Page author
Route::get('/authors/{user:username}', [PostController::class, 'author']);

// Menampilkan posts berdasarkan category (load/lazy eager loading)
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('pages.posts', [
//         'title' => 'Category web ',
//         'posts' => $category->posts,
//     ]);
// });
