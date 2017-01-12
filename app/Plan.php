<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Log;
use \stdClass;

class Plan extends Model {

    //
    protected $table = "plan";
    protected $primaryKey = "id_plan";
    protected $fillable = [
        "plan_name"
    ];

    public function scopeActive($query) {
        return $query->where('fl_status', 1);
    }

    public function scopeFreesearch($query, $value) {
        return $query->where('category_name', 'ilike', '%' . $value . '%');
    }

}
