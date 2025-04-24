<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = ['title', 'description', 'tags', 'slug', 'category', 'rank'];



    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // Generate and set the slug
            $user->attributes['slug'] = $user->generateUniqueValue();
        });
    }


    // Generate a 8-digit unique number
    private function generateUniqueValue()
    {
        do {
            $slug = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
        } while (Task::where('slug', $slug)->exists());

        return $slug;
    }

    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'slug');
    }
}
