<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionBankModel extends Model
{
    protected $table = 'transaction_bank';
    protected $primaryKey = 'id';
    protected $fillable = ['reseller_id', 'bank_name', 'account_number', 'accountant_name', 'branch_name', 'routing_number'];


    public function reseller()
    {
        return $this->belongsTo(Reseller::class, 'reseller_id');
    }
}
