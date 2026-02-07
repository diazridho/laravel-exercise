<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
                    ->latest()->get()
            ]
        );
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required',
            'category' => 'required|exists:categories,name',
            'body' => 'required',
        ]);

        // Find Author and Category IDs
        $author = User::where('name', $validated['author'])->first();
        $category = Category::where('name', $validated['category'])->first();

        // Generate Slug
        $slug = Str::slug($validated['title']) . '-' . rand(1, 1000);

        Post::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'body' => $validated['body'],
            'author_id' => $author->id,
            'category_id' => $category->id,
        ]);
        return redirect('/posts')->with('success', 'Article created successfully!');
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