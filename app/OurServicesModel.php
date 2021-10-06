<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurServicesModel extends Model
{
    protected $table = 'our_service';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'icon', 'description'];
}
