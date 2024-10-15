<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'category_id', 'image_url'];

    /**
     * A Post belongs to one Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * A Post can have many Tags.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
