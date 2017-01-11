<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessContact extends Model {

    protected $table = "business_contact";
    protected $primaryKey = "id_business_contact";
    protected $fillable = ["id_business", "contact_name", "contact_document", "contact_document_type", "contact_phone", "contact_email"];	
}