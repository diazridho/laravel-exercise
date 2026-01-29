<?php
use App\Models\Category;
use Illuminate\Support\Facades\Route;
// class Post untuk datanya
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\ContactController;


// // tidak bisa kirim data
// Route::view('/','pages.beranda');

Route::get('/', function () {
    return view('pages.beranda', [
        'title' => 'Beranda'
    ]);
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

// route model binding
Route::get('/posts/{post:slug}', function (Post $post) {

    return view('pages.post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('pages.contact', ['title' => 'Contact']);
});

// untuk page blog utama
Route::get('/posts', function () {
    return view('pages.posts', [
        'title' => 'Blog',
        'posts' => Post::all()
    ]);
});

// Menampilkan posts berdasarkan author
Route::get('/authors/{user:username}', function (User $user) {
    return view('pages.posts', [
        'title' => count($user->posts) . ' Post by ' . $user->name,
        'posts' => $user->posts,
    ]);
});

// Menampilkan posts berdasarkan category
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('pages.posts', [
        'title' => 'Category web ',
        'posts' => $category->posts,
    ]);
});
