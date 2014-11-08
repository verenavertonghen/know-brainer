<?php

class SessionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::check()) return Redirect::to('/');
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
			'email' 	=> 'required|email',
			'password' 	=> 'required'
		];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::back()->withErrors($validator)->withInput(Input::except('password'));

		}
		else{
			$remember = false;
			if(Input::get('remember_me') == 'yes'){
				$remember = true;
			} 
			if(Auth::attempt(Input::only('email', 'password'), $remember)){
				return Redirect::back();
			}
			else{
				return Redirect::back()->withInput();
			}
		}

		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		return Redirect::to('/login');
	}


}
