<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Log;
use \stdClass;

class Category extends Model {

    //
    protected $table = "category";
    protected $primaryKey = "id_category";
    protected $fillable = [
        "category_name"
        , "category_phone"
        , "category_whatsapp"
        , "category_email"
        , "category_address"
        , "category_zip"
        , "category_state"
        , "category_country"
        , "category_latitude"
        , "category_longitude"
        , "category_website"
        , "category_type"
        , "category_entity"
        , "category_scale"
        , "category_about"
        , "category_services"
        , "category_abn"
        , "category_tfn"
        , "fl_status"
        , "usuario_registra"
        , "usuario_modifica"
    ];

    public function scopeActive($query) {
        return $query->where('fl_status', 1);
    }

    public function scopeFreesearch($query, $value) {
        return $query->where('category_name', 'ilike', '%' . $value . '%');
    }

}
