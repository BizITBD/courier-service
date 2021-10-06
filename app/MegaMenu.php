<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MegaMenu extends Model
{
    protected $table = 'mega_menus';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'subtitle', 'header', 'icon', 'banner', 'description', 'created_by', 'status', 'slug'];
}
