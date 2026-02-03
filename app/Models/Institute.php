<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    protected $fillable = ['title', 'description', 'thumbnail', 'features', 'action_url'];

    // Helper to get features array
    public function getFeaturesListAttribute()
    {
        if (empty($this->features)) return [];
        return array_values(array_filter(explode("\n", str_replace("\r", "", $this->features))));
    }
}
