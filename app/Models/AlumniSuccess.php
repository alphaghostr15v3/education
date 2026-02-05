<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumniSuccess extends Model
{
    protected $table = 'alumni_success';

    protected $fillable = [
        'name',
        'image',
        'company',
        'position',
        'testimonial',
        'status'
    ];

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
