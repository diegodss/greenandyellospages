<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessValidity extends Model {

    protected $table = "business_validity";
    protected $primaryKey = "id_business_validity";
    protected $fillable = ["id_business", "validity_start" ,"validity_end"];	
}
