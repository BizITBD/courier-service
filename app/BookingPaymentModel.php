<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingPaymentModel extends Model
{
    protected $table = 'booking_payment';
    protected $primaryKey = 'id';
    protected $fillable = ['type', 'date', 'amount', 'customer_id', 'invoice_id', 'reseller_id'];
}
