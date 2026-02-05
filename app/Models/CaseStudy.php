<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CaseStudy extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'excerpt',
        'description',
        'challenge',
        'solution',
        'result',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($caseStudy) {
            if (empty($caseStudy->slug)) {
                $caseStudy->slug = Str::slug($caseStudy->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
