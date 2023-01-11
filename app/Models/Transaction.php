<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';

    protected $fillable = [
        'payer_id',
        'vendor_id',
        'amount',
        'senangpay_id', 
        'booth_id',
        'details_id',
        'toyyib_billcode', 
    ];
}
