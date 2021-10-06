<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDeliveryModel extends Model
{
    protected $table = 'booking_delivery';
    protected $primaryKey = 'id';
    protected $fillable = ['booking_id', 'delivery_name', 'delivery_phone', 'item_description', 'special_info', 'date'];

    public function booking()
    {
        return $this->belongsTo(BookingBaseModel::class, 'booking_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
