<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InportExport extends Model
{
    protected $table = 'inport_exports';
    protected $primaryKey = 'id';
    protected $fillable = ['city_id', 'area_id', 'post_code', 'home_delivery', 'lockdown', 'charge_1kg', 'charge_2kg', 'charge_3kg', 'cod_charge', 'status'];


    //relations

    public function city()
    {
        return $this->belongsTo(CityModel::class, 'city_id');
    }
    public function area()
    {
        return $this->belongsTo(DeliveryZoneModel::class, 'area_id');
    }
}
