<?php
// namespace agar class yang dibuat dapat langsung digunakan
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Import factory
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Post extends Model //otomatis terhubung dengan table posts
{
    use HasFactory, Notifiable;

    protected $table = "posts"; //digunakan jika nama table berbeda defaultnya adalah +s
    protected $primaryKey = "absen"; //defaultnya adalah id
    protected $fillable = ['title', 'author', 'slug', 'body'];

    // (eloquent relationship) model Post adalah anak dari model User
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
;