<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingRecipentModel extends Model
{
    protected $table = 'booking_recipient';
    protected $primaryKey = 'id';
    protected $fillable = ['booking_id', 'recipient_name', 'recipient_address', 'recipient_phone', 'city_id', 'zone_id', 'recipient_area', 'date'];

    public function bookingId()
    {
        return $this->belongsTo(BookingBaseModel::class, 'booking_id');
    }
    public function city()
    {
        return $this->belongsTo(CityModel::class, 'city_id');
    }
    public function reseller()
    {
        return $this->belongsTo(BookingBaseModel::class, 'booking_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function zone()
    {
        return $this->belongsTo(DeliveryZoneModel::class, 'zone_id');
    }
    public function area()
    {
        return $this->belongsTo(DeliveryAreaModel::class, 'recipient_area');
    }
}
