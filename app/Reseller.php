<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reseller extends Authenticatable
{

    use Notifiable;
    protected $guard = 'login';

    protected $table = 'resellers';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'phone', 'email', 'password', 'address', 'image', 'status', 'company_name', 'fb_page_link', 'interest', 'trade_licence', 'type', 'reseller_interest', 'merchant_interest'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function setInterestAttribute($value)
    {
        $this->attributes['interest'] = json_encode($value);
    }

    public function getInterestAttribute($value)
    {
        return  json_decode($value);
    }



    public function setResellerInterestAttribute($value)
    {
        $this->attributes['reseller_interest'] = json_encode($value);
    }
    public function getResellerInterestAttribute($value)
    {
        return  json_decode($value);
    }


    public function setMerchantInterestAttribute($value)
    {
        $this->attributes['merchant_interest'] = json_encode($value);
    }
    public function getMerchantInterestAttribute($value)
    {
        return  json_decode($value);
    }



    public function bookingPayment()
    {
        return $this->hasMany(BookingPaymentModel::class, 'reseller_id');
    }
    public function totalCommission()
    {
        return $this->hasMany(ResellerCommissionModel::class, 'reseller_id');
    }
    public function commissionData()
    {
        return $this->hasMany(ResellerCommissionModel::class, 'reseller_id')->where('due', '>', 0);
    }
    public function base()
    {
        return $this->hasMany(BookingBaseModel::class, 'reseller_id');
    }
    public function paymentData()
    {
        return $this->hasMany(MerchantBooking::class, 'merchant_id')->where('due', '>', 0);
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->created_by = Auth::user()->id ?? null;
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::user()->id ?? null;
        });
    }
}
