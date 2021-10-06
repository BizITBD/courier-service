<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionMobileModel extends Model
{
    protected $table = 'transaction_mobile';
    protected $primaryKey = 'id';
    protected $fillable = ['reseller_id', 'mobile_number', 'account_type'];

    public function reseller()
    {
        return $this->belongsTo(Reseller::class, 'reseller_id');
    }
}
