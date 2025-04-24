<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['name', 'slug'];



    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // Generate and set the slug
            $user->attributes['slug'] = $user->generateUniqueValue();
        });
    }


    // Generate a 6-digit unique number
    private function generateUniqueValue()
    {
        do {
            $slug = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        } while (Category::where('slug', $slug)->exists());

        return $slug;
    }
}
