<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = ['vehicle', 'customer_name', 'sales_person', 'enquiry_type', 'enquiry_status', 'enquiry_source'];
}
