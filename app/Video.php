<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'description', 'order_number', 'slug', 'embed_co'];

    /**
     * Relationship with `user_video` table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function watchedVideo()
    {
        return $this->hasMany('App\UserVideo', 'video_id', 'id');
    }
}
