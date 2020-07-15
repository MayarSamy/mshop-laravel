<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;


class Product extends Model
{
    //use Searchable;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'reorder_point',
        'image',
        'category_id',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
