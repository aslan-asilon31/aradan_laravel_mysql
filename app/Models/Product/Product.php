<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'products';

    protected $keyType = 'string';

    public $primaryKey = 'id';

    protected $fillable = [
        'name',
        'image',
        'price',
        'stock',
        'discount',
        'slug',
        
    ];



}
