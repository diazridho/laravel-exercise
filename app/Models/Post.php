<?php
// namespace agar class yang dibuat dapat langsung digunakan
namespace App\Models;
use Illuminate\Support\Arr;

class Post
{
    // fungsi untuk datanya, biasanya menggunakan databse
    public static function all()
    {
        return [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul artikel 1',
                'author' => 'Diaz',
                'body' => 'The tag in HTML is an anchor element. Its core job is simple but foundational: 
            creating hyperlinks. Hyperlinks are the connective tissue of the web. 
            Without that, the internet would be a pile of lonely documents.'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul artikel 2',
                'author' => 'Diaz Ridho',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
             Quas nostrum sapiente incidunt ab reprehenderit repellat voluptatum quam, cumque, dolores architecto adipisci aspernatur accusamus. 
             Doloremque exercitationem tempora voluptas aliquam in. Fugit.'
            ]
        ];
    }

    // Fungsi ini untuk memproses/logic data
    public static function find($slug): array
    {

        $post = Arr::first(static::all(), function ($item) use ($slug) {
            return $item['slug'] == $slug;
        });

        if (!$post) {
            abort(404);
        }

        return $post;
    }
}
;