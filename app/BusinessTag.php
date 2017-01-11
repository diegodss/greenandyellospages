<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessTag extends Model {

    protected $table = "business_tag";
    protected $primaryKey = "id_business_tag";
    protected $fillable = ["id_business", "tag_name"];	
}