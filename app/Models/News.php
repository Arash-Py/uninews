<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'news';
    protected $fillable = ['title', 'body'];
    public function getPicAttribute()
    {
        if ($this->hasMedia('pic')) {
            $media = $this->getMedia('pic');
            $last = $media->last();
            return $last->getFullUrl();
        } else {
            return 'https://ui-avatars.com/api/?name=' . urlencode($this->title) . '&color=7F9CF5&background=EBF4FF';
        }
    }
}
