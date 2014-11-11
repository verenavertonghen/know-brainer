<?php
class Vote extends Eloquent {
	
	// MASS ASSIGNMENT -------------------------------------------------------
	// define which attributes are mass assignable (for security)
	// we only want these 3 attributes able to be filled
	protected $fillable = array('');
	public $timestamps = false;

	// LINK THIS MODEL TO OUR DATABASE TABLE ---------------------------------
	// since the plural of fish isnt what we named our database table we have to define it
	protected $table = 'kb_votes';

	// DEFINE RELATIONSHIPS --------------------------------------------------
	public function user() {
		return $this->belongsTo('User', 'fk_user');
	}

	public function post(){
		return $this->belongsTo('Post', 'fk_workshop');
	}

}