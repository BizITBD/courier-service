<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchantBooking extends Model
{
    protected $table = 'merchant_bookings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'booking_id', 'recipient_name', 'charge_type', 'recipient_phone', 'recipient_address', 'recipient_city', 'recipient_area', 'date', 'payable', 'merchant_id', 'status', 'store_name',
        'charges', 'special_info', 'cashto_collect', 'product_price', 'paid', 'due', 'pay'
    ];
    public function Reseller()
    {
        return $this->belongsTo(Reseller::class, 'merchant_id');
    }
    public function City()
    {
        return $this->belongsTo(CityModel::class, 'recipient_city');
    }
    public function Area()
    {
        return $this->belongsTo(DeliveryZoneModel::class, 'recipient_area');
    }
    public function coverageAreaCharge()
    {
        return $this->belongsTo(CoverageAreaCharge::class, 'charge_type');
    }
}
