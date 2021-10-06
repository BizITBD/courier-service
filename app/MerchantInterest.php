<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchantInterest extends Model
{
    protected $table = 'merchant_interests';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'status'];
}
