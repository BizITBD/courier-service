<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoverageAreaCharge extends Model
{
    protected $table = 'coverage_area_charges';
    protected $primaryKey = 'id';
    protected $fillable = ['coverage_id', 'type_id', 'cost'];


    public function coverageArea()
    {
        return $this->belongsTo(InportExport::class, 'coverage_id')->withDefault();
    }
    public function type()
    {
        return $this->belongsTo(ChargeType::class, 'type_id')->withDefault();
    }
}
