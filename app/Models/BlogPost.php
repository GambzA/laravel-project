<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = ['title','content'];
    
    use HasFactory;

    public function toArray()
    {
        $attributes = parent::toArray();

        // Remove milliseconds and time zone from timestamps
        $attributes['created_at'] = $this->created_at->format('Y-m-d H:i:s');
        $attributes['updated_at'] = $this->updated_at->format('Y-m-d H:i:s');

        return $attributes;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
