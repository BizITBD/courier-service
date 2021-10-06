<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppSettingsModel extends Model
{
    protected $table = 'app_settings';
    protected $primaryKey = 'id';
    protected $fillable = ['terms_and_conditions', 'banner_picture', 'banner_text', 'count_rorder', 'count_pending', 'count_delivery', 'footer_blog', 'footer_about', 'footer_privacy', 'footer_terms', 'banner1', 'banner2', 'banner3', 'company_logo', 'fav_icon'];
}
