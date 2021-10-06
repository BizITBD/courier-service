<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingBaseModel extends Model
{
    protected $table = 'booking_base';
    protected $primaryKey = 'id';
    protected $fillable = ['store', 'product_type', 'order_id', 'reseller_id', 'reseller_commission', 'delivery_price', 'product_price', 'total_price', 'due_amount', 'paid_amount', 'status', 'date', 'special_info'];



    public function resellerCommission()
    {
        return $this->hasOne(ResellerCommissionModel::class, 'invoice_id', 'order_id');
    }
    public function paidAmount()
    {
        return $this->hasMany(BookingPaymentModel::class, 'invoice_id');
    }
    public function reseller()
    {
        return $this->belongsTo(Reseller::class, 'reseller_id');
    }
    public function recipent()
    {
        return $this->hasOne(BookingRecipentModel::class, 'booking_id');
    }
    public function delivery()
    {
        return $this->hasOne(BookingDeliveryModel::class, 'booking_id');
    }
    public function product()
    {
        return $this->hasMany(BookingProductModel::class, 'booking_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
