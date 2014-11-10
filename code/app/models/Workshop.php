<?php

class Workshop extends Eloquent {

	protected $table = 'kb_workshops';
    public $timestamps = true;
    protected $fillable = ['title', 'description', 'location','start_date','end_date','picture','subscribers_amount','fk_user'];

    public static  $rules = [
        'title' => 'required',
        'description' => 'required',
        'category' => 'required',
        'location' => 'required',
        'time' => 'required',
        'date' => 'required',
        'duration' => 'required',
        'subscribers_amount' => 'required'
    ];

    public $errors;

    public function getMessages(){
        return $this->messages;
    }

    public function user()
    {
        return $this->belongsTo('User', 'fk_user');
    }

    public function comments(){
        return $this->hasMany('Comment');
    }

    public function isValid($data)
    {
        $validation = Validator::make($data, static::$rules);

        if ($validation->passes()) return true;

        $this->messages = $validation->messages();
        return false;

    }

    public function subscribers()
    {
        return $this->hasMany('User','kb_users_workshops','fk_workshop','fk_user');
    }
}