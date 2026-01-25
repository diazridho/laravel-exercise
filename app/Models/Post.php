<?php
// namespace agar class yang dibuat dapat langsung digunakan
namespace App\Models;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Post extends Model //otomatis terhubung dengan table posts
{
    protected $table = "posts"; //digunakan jika nama table berbeda defaultnya adalah +s
    protected $primaryKey = "absen"; //defaultnya adalah id
    protected $fillable = ['title', 'author', 'slug', 'body'];
}
;