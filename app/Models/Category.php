<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'CATEGORY';
    public $timestamps = false;
    public function container()
    {
        return $this->hasMany(Container::class, 'ID_CATEGORY','ID_CATEGORY');;
    }
    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}
