<?php
// namespace agar class yang dibuat dapat langsung digunakan
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Import factory
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Post extends Model //otomatis terhubung dengan table posts
{
    use HasFactory, Notifiable;

    protected $table = "posts"; //digunakan jika nama table berbeda defaultnya adalah +s
    protected $primaryKey = "absen"; //defaultnya adalah id
    protected $fillable = ['title', 'slug', 'body', 'author_id', 'category_id'];

    // (eloquent relationship) model Post adalah anak dari model User
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    //eager loading, ini akan selalu dibawa ketika model digunakan
    protected $with = ['author', 'category'];

    //Query Scope, cakupan data yang akan kita ambil dari db
    public function scopeFilter(Builder $query, array $filters): void
    {
        // when adalah pasangan query parameter
        // Scope Search
        $query->when(
            $filters['search'] ?? false,
            function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            }
        );
        // Scope Category
        $query->when(
            $filters['category'] ?? false,
            function ($query, $category) {
                $query->whereHas('category', fn($query) => $query->where('slug', $category));
            }
        );
    }
}
;