<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryZoneModel extends Model
{
    protected $table = 'recipient_zone';
    protected $primaryKey = 'id';
    protected $fillable = ['zone_name', 'city_id', 'status'];


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function city()
    {
        return $this->belongsTo(CityModel::class, 'city_id');
    }
}
