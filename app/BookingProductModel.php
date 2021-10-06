<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingProductModel extends Model
{
    protected $table = 'booking_product';
    protected $primaryKey = 'id';
    protected $fillable = ['booking_id', 'product_size', 'category_id', 'product_id', 'quantity', 'price', 'date'];

    public function bookingId()
    {
        return $this->belongsTo(BookingBaseModel::class, 'booking_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
