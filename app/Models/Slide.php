<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Slide extends Model
{
    use HasFactory;
    protected $fillable = [
        'slider_id',
        'title',
        'text',
        'link',
        'image'
    ];



    public function slider() {
        return $this->belongsTo(Slider::class);
    }
}
