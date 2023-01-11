<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booth extends Model
{
    use HasFactory;
    protected $table = 'booth';

    protected $fillable = [
        'booth_id',
        'booth_name', 
    ];
}
