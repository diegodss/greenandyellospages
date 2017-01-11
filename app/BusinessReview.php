<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessReview extends Model {

    protected $table = "business_review";
    protected $primaryKey = "id_business_tag";
    protected $fillable = ["id_business", "id_user", "review_comment", "review_name", "review_email"];	
}
