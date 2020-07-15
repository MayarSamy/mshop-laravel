<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'product_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(
        Product::class, 
        'iventory_products', 
        'user_id', 
        'product_id')
        ->withPivot('price', 'quantity')
        ->withTimestamps();
    }
}
