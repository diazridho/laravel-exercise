<?php
use Illuminate\Support\Facades\Route;
// class Post untuk datanya
use App\Models\Post;


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


