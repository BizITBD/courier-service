<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    protected $table = 'city_models';
    protected $primaryKey = 'id';
    protected $fillable = ['city_name', 'delivery_fee', 'status'];
    protected $casts = [
        'delivery_fee' => 'integer'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function most_city()
    {
        return $this->hasMany(BookingRecipentModel::class, 'city_id');
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
