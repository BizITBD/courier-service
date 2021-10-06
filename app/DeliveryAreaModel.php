<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryAreaModel extends Model
{
    protected $table = 'delivery_area';
    protected $primaryKey = 'id';
    protected $fillable = ['area_name', 'zone_id', 'status'];


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function zone()
    {
        return $this->belongsTo(DeliveryZoneModel::class, 'zone_id');
    }
}
