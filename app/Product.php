<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['category_id', 'product_details', 'subcategory_id', 'name', 'slug', 'sell_price', 'reseller_commission', 'commission_percent', 'image', 'product_size', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategoryModel::class, 'subcategory_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function most_product()
    {
        return $this->hasMany(BookingProductModel::class, 'product_id');
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
