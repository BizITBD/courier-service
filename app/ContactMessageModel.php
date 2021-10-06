<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMessageModel extends Model
{
    protected $table = 'contact_messages';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'Message'];
}
