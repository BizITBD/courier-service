<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interests extends Model
{
    protected $table = 'interests';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'status'];
}
