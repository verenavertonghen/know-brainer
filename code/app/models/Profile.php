<?php

class Profile extends Eloquent {

	protected $table = 'kb_fb_profiles';

    public function user()
    {
        return $this->belongsTo('User');
    }
}