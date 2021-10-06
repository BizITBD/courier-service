<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSizeModel extends Model
{
    protected $table = 'product_size';
    protected $primaryKey = 'id';
    protected $fillable = ['size', 'status'];
}
