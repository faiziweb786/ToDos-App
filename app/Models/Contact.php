<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'pnumber',
        'opt_number',
        'email',
        'opt_email',
        'comp_email',
        'start_day',
        'end_day',
        'off_day',
        'start_time',
        'end_time'
    ];
}
