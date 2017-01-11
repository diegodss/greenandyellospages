<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessPaymentMethod extends Model {

    protected $table = "business_payment_method";
    protected $primaryKey = "id_business_payment_method";
    protected $fillable = ["id_business", "code_payment_method"];	
}