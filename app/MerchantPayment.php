<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchantPayment extends Model
{
    protected $table = 'merchant_payments';
    protected $primaryKey = 'id';
    protected $fillable = ['booking_id', 'date', 'amount', 'transaction_type', 'created_by', 'reseller_id', 'transaction_id', 'base_id'];

    public function reseller()
    {
        return $this->belongsTo(Reseller::class, 'reseller_id');
    }
    protected $casts = [
        'amount' => 'decimal:8',
    ];
}
