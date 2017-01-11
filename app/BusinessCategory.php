<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model {

    protected $table = "business_category";
    protected $primaryKey = "id_business_category";
    protected $fillable = ["id_business", "id_category"];	
}
