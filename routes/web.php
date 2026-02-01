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

// route model binding
Route::get('/posts/{post:slug}', function (Post $post) {

    return view('pages.post', ['title' => 'Single Post', 'post' => $post]);
});

// untuk page blog utama (eager loading in model).
Route::get('/posts', function () {
    // dump(request('search'));
    // masih butuh penjelasn
    return view('pages.posts', [
        'title' => 'Blog',
        'posts' => Post::filter(request(['search','category']))->latest()->get()
    ]);
});

// Menampilkan posts berdasarkan author (load/lazy eager loading)
Route::get('/authors/{user:username}', function (User $user) {
    // Alternatif eager load jika dibutuhkan di route tertentu
    $posts = $user->posts()->with(['category', 'author'])->get();
    return view('pages.posts', [
        'title' => count($posts) . ' Post by ' . $user->name,
        'posts' => $posts,
    ]);
});

// Menampilkan posts berdasarkan category (load/lazy eager loading)
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('pages.posts', [
//         'title' => 'Category web ',
//         'posts' => $category->posts,
//     ]);
// });
