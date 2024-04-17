<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];


    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }


    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


    public function colorAttributeValue()
    {
        return $this->belongsTo(AttributeValue::class, 'color_id');
    }


    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
