<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorDetails extends Model
{
    use HasFactory;
    protected $table = 'vendor_details';

    protected $fillable = [
        'user_id', 'company_name', 'designation', 'nationality', 'company_address', 'business_nature', 'product_details', 'ssm_cert', 'vaccine_cert'
    ];
}
