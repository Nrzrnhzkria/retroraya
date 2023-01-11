<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponCategories extends Model
{
    use HasFactory;

    protected $table = 'coupon_categories';

    protected $fillable = [
        'category_name',
        'img_name', 
    ];



}
