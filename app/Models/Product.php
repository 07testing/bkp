<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    protected $fillable = [
        'category_id',
        'pname',
        'ptype',
        'quantity',
        'psize',
    ];

    public static function getSingleData($column=[], $whereFilter){
        $query = Product::select($column)->where($whereFilter)->first();
        return $query;

    }
}
