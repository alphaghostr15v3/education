<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title', 'description', 'video_url', 'thumbnail', 'is_published', 'type'];

    public function getEmbedUrlAttribute()
    {
        $url = $this->video_url;
        $videoId = null;
        
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
            $videoId = $match[1];
        }

        if ($videoId) {
            return "https://www.youtube.com/embed/" . $videoId;
        }

        return $url; // Return original if not matched (could be direct link etc)
    }
}
