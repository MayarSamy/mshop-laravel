<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;


class Category extends Model
{
    use SoftDeletes;
    use Searchable;

    
    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'level'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
