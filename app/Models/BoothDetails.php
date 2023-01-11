<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoothDetails extends Model
{
    use HasFactory;
    protected $table = 'booth_details';

    protected $fillable = [
        'details_id',
        'booth_type',
        'lot_placement',
        'price',
        'booth_id', 
    ];
}
