<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'date',
        'total_amount',
        'customer_id',
        'payment_id',
        'user_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function products()
    {
        return $this->belongsToMany(
        Product::class, 
        'order_details', 
        'order_id', 
        'product_id')
        ->withPivot('price', 'quantity', 'total')
        ->withTimestamps();
    }
}
