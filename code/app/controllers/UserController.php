<?php

class UserController extends \BaseController {

	protected $user;

	public function __construct(User $user){
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check()){
			if(Auth::user()->role === 0){
				$users = $this->user->where('role', '=', '1')->paginate(1);
				$view = View::make('users.show')->with('users', $users);
			}
			else{
				$view = Redirect::to('/');
			}
		}
		else{
			$view = Redirect::to('/');
		}
		return $view;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = array();

		$rules = [
			'username' 	=> 'required|unique:kb_users',
			'password' 	=> 'required',
			'email' 	=> 'required|unique:kb_users|email'
		];

		if(! $this->user->isValid(Input::all(), $rules)){
			return Redirect::back()->withInput()->withErrors($this->user->getMessages());
		}
		else{
			$user = new User;
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->email = Input::get('email');

			$data['username'] = Input::get('username');

			Mail::queue('emails.welcome', $data, function($message) use ($user){
				$message->from('norepley@knowbrainer.be', 'Knowbrainer');
				$message->to($user->email, $user->username)->subject('Welkom bij Knowbrainer!');
			});

			$user->save();
		}

		return Redirect::to('/');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->user->find($id);
		if($user){
			$view = View::make('users.view')->with('user', $user);
		}
		else{
			$view = Redirect::to('/');
		}
		

		return $view;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(Auth::check()){
			if($id == Auth::user()->id || Auth::user()->role === 0){
			$user = User::find($id);
			$view = View::make('users.edit')->with('user', $user);
			}
			else{
				$view = Redirect::to('/');
			}
		}

		else{
			$view = Redirect::to('/');
		}
		
		return $view;
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'username' => 'required',
			'email' => 'required|email'
			);

			$validator = Validator::make(Input::all(), $rules);

		if( $validator->fails() ){
				
				return Redirect::to('users/' . $id . '/edit')->withErrors($validator)->withInput(Input::except('password'));
			}
			else{
				$user = $this->user->find($id);

				$destinationPath = '';
    			$filename        = '';

   				if (Input::hasFile('image')) {
        			$file            = Input::file('image');
        			$destinationPath = 'img/uploads/avatars/';
        			$filename        = str_random(6) . '_' . $file->getClientOriginalName();
        			$uploadSuccess   = $file->move($destinationPath, $filename);
    				$user->avatar 	 = '/'.$destinationPath.$filename;	 
    			}


				$user->username = Input::get('username');
				$user->email = Input::get('email');
				$user->about = Input::get('about');
				
				$user->facebook = Input::get('facebook');
				$user->twitter = Input::get('twitter');
				$user->website = Input::get('website');
				$user->youtube = Input::get('youtube');
			}

			$user->save();

			return Redirect::to('/');
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//Hard delete
		/*
		Auth::logout();
		if ($user->delete()) {
			return Redirect::to('/');
    	}	
    	*/
	}


}
