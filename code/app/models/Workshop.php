<?php

class Workshop extends Eloquent {

	protected $table = 'kb_workshops';
    public $timestamps = true;
    protected $fillable = ['title', 'description', 'location','start_date','end_date','picture','subscribers_amount','fk_user'];

    public static  $rules = [
        'title' 	        => 'required',
        'description'       => 'required',
        'category' 	        => 'required',
        'location' 	        => 'required',
        'start_date'        => 'required',
        'end_date' 	        => 'required',
        'picture'           => '',
        'subscribers_amount'=> 'required'
    ];

    public $errors;

    public function user()
    {
        return $this->belongsTo('User', 'fk_user');
    }

    public function isValid($data)
    {
        $validation = Validator::make($data, static::$rules);

        if ($validation->passes()) return true;

        $this->errors = $validation->messages();
        return false;

    }

    public function subscribers()
    {
        return $this->belongsToMany('User','kb_users_workshops','fk_workshop','fk_user');
    }
}