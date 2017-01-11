<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessMedia extends Model {

    protected $table = "business_media";
    protected $primaryKey = "id_business_media";
    protected $fillable = ["id_business", "media_name" ,"media_type", "media_path"];	
}
