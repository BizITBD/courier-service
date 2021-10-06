<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'icon', 'description', 'status'];
}
