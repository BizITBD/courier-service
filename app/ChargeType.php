<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChargeType extends Model
{
    protected $table = 'charge_types';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'status'];
}
