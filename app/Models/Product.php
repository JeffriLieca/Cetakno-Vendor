<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'PRODUCT';
    // protected $primaryKey = ['ID_CONTAINER', 'ID_PRODUCT'];
    protected $fillable = ['ID_CONTAINER', 'ID_PRODUCT', 'PRODUCT_NAME', 'JENIS', 'IMAGE','DESC_PRODUCT','QTY_PRODUCT','TAMBAHAN','STATUS','STATUS_DELETE','BERAT','UNIT' ];
    public $timestamps = false;

    // protected $fillable =['PRODUCT_NAME'];
    // public function containers()
    // {
    //     return $this->belongsTo(Container::class, 'ID_CONTAINER','ID_CONTAINER');
    // }
}
