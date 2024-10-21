<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'author_name', 'published_at'];

    // Enable automatic date casting
    protected $casts = [
        'published_at' => 'datetime',
    ];
    public function comments() {
        return $this->hasMany(Comment::class, 'post_id'); // Adjust the foreign key if necessary
    }
}
