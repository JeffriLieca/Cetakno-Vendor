<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;
    protected $table = 'CONTAINER';
    public $timestamps = false;
    public function categories()
    {
        return $this->belongsTo(Category::class, 'ID_CATEGORY','ID_CATEGORY');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'ID_CONTAINER','ID_CONTAINER');
    }
    
}
