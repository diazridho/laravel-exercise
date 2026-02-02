<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Page blog utama
    public function index()
    {
        // dump(request('search'));

        // eager loading in model, ada query parameter.
        // backend menerima url search dan category
        return view(
            'pages.posts',
            [
                'title' => 'Blog',
                'posts' => Post::filter(request(['search', 'category']))
                    ->latest()->paginate(5)->withQueryString()
            ]
        );
    }

    // route model binding
    public function show(Post $post)
    {
        return view(
            'pages.post',
            ['title' => 'Single Post', 'post' => $post]
        );
    }

    // Page author
    public function author(User $user)
    {
        // Alternatif eager load jika dibutuhkan di route tertentu
        $posts = $user->posts()->with(['category', 'author'])->get();
        return view('pages.posts', [
            'title' => count($posts) . ' Post by ' . $user->name,
            'posts' => $posts,
        ]);
    }
}