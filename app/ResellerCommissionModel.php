<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResellerCommissionModel extends Model
{
    protected $table = 'reseller_commission';
    protected $primaryKey = 'id';
    protected $fillable = ['reseller_id', 'invoice_id', 'commission', 'paid', 'due'];

    protected $appends = [
        "date",
    ];

    public function getDateAttribute()
    {
        return  $this->attributes['created_at'] = $this->created_at->format("d/m/y");
    }

    public function reseller()
    {
        return $this->belongsTo(Reseller::class, 'reseller_id');
    }
    protected $casts = [
        'commission' => 'decimal:2',
        'paid' => 'decimal:2',
        'due' => 'decimal:2',
    ];
}
