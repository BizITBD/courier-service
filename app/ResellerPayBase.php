<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResellerPayBase extends Model
{
    protected $table = 'reseller_pay_bases';
    protected $primaryKey = 'id';
    protected $fillable = ['date', 'reseller_id', 'total_Amount', 'created_by'];

    public function reseller()
    {
        return $this->belongsTo(Reseller::class, 'reseller_id');
    }
    public function paidby()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function invoiceInfo()
    {
        return $this->hasMany(ResellerCommissionPayModel::class, 'base_id');
    }
    protected $casts = [
        'total_Amount' => 'decimal:2',
    ];
}
