<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'identifier',
        'arrow',
        'dots',
        'status',
        'slug'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($slide) {
            $slide->identifier = Str::slug($slide->identifier);

            $slide->slug = Str::slug($slide->identifier);
        });

        static::updating(function ($slide) {
            $slide->identifier = Str::slug($slide->identifier);
            $slide->slug = Str::slug($slide->identifier);
        });
    }

    public function slides() {
        return $this->hasMany(Slide::class);
    }

    public function page() {
        return $this->belongsTo(Page::class);
    }
}
  