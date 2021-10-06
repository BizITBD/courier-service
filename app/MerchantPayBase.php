<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchantPayBase extends Model
{
    protected $table = 'merchant_pay_bases';
    protected $primaryKey = 'id';
    protected $fillable = ['date', 'merchant_id', 'total_Amount', 'created_by'];

    public function reseller()
    {
        return $this->belongsTo(Reseller::class, 'merchant_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function paidby()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function invoiceInfo()
    {
        return $this->hasMany(MerchantPayment::class, 'base_id');
    }
    protected $casts = [
        'total_Amount' => 'decimal:2',
    ];
}
