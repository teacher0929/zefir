<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
