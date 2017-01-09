<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Log;
use \stdClass;

class Business extends Model {

    //
    protected $table = "business";
    protected $primaryKey = "id_business";
    protected $fillable = [
        "business_name"
        , "business_phone"
        , "business_whatsapp"
        , "business_email"
        , "business_address"
        , "business_zip"
        , "business_state"
        , "business_country"
        , "business_latitude"
        , "business_longitude"
        , "business_website"
        , "business_type"
        , "business_entity"
        , "business_scale"
        , "business_about"
        , "business_services"
        , "business_abn"
        , "business_tfn"
        , "fl_status"
        , "usuario_registra"
        , "usuario_modifica"
    ];

    public function scopeActive($query) {
        return $query->where('fl_status', 1);
    }

    public function scopeFreesearch($query, $value) {
        return $query->where('business_name', 'ilike', '%' . $value . '%');
    }

}
