<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResellerCommissionPayModel extends Model
{

    protected $table = 'reseller_commission_pay';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = ['invoice_id', 'date', 'amount', 'transaction_type', 'created_by', 'transaction_id', 'reseller_id', 'base_id'];

    public function reseller()
    {
        return $this->belongsTo(Reseller::class, 'reseller_id');
    }
    public function base()
    {
        return $this->belongsTo(ResellerPayBase::class, 'base_id');
    }
    protected $casts = [
        'amount' => 'decimal:8',
    ];
}
