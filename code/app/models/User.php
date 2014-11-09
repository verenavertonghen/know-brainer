<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	public $messages;
	public $timestamps = true;
    protected $fillable = ['username', 'email', 'password','avatar','over','facebook','twitter','website'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'kb_users';


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function isValid($data, $rules){
		$validation = Validator::make($data, $rules);
		if($validation->passes()){
			return TRUE;
		}
		$this->messages = $validation->messages();
		return false;
	}

	public function getMessages(){
		return $this->messages;
	}

	 public function profiles()
    {
        return $this->hasMany('Profile');
    }
}
