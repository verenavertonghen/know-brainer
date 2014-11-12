<?php

class RemindersController extends Controller {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return View::make('password.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{

		$validator = Validator::make(
            array('email' => Input::get('email')),
            array('email' => 'required|email')
        );

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::all());
        }
        else{
        	$response = Password::remind(Input::only('email'), 
			function($message){
				$message->subject('Wachtwoord wijzigen');
			});

			switch ($response)
			{
				case Password::INVALID_USER:
					return Redirect::back()->with('error', Lang::get($response));

				case Password::REMINDER_SENT:
					return Redirect::back()->with('success', Lang::get($response));
			}
        }	
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		return View::make('password.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$validator = Validator::make(
            array('email' => Input::get('email'), 'password' => Input::get('password'), 'password_confirmation' => Input::get('password_confirmation')),
            array('email' => 'required|email', 'password' => 'required|min:6|same:password_confirmation')
        );

        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('password', 'password_confirmation'));
        } else {

			$response = Password::reset($credentials, function($user, $password)
			{
				$user->password = Hash::make($password);

				$user->save();
			});

			switch ($response)
			{
				case Password::INVALID_PASSWORD:
					return Redirect::back()->with('error-password', Lang::get($response));
				case Password::INVALID_TOKEN:
					return Redirect::back()->with('error-token', Lang::get($response));
				case Password::INVALID_USER:
					return Redirect::back()->with('error-user', Lang::get($response));

				case Password::PASSWORD_RESET:
					return Redirect::back()->with('success', Lang::get($response));
			}
		}
	}

}
