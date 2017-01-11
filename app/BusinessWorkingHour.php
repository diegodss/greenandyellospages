<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessWorkingHour extends Model {

    protected $table = "business_working_hour";
    protected $primaryKey = "id_business_working_hour";
    protected $fillable = ["id_business", "working_hour_status" ,"working_hour_day" ,"working_hour_time_start" ,"working_hour_time_end"];	
}