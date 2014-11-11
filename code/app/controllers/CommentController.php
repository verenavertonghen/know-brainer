<?php

class CommentController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 $rules = array(
            'comment' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $comment = new Comment;
            $comment->comment     	= Input::get('comment');
            $comment->fk_user   	= Auth::user()->id;
            $comment->fk_workshop 	= Input::get('fk_workshop');
            $comment->save();

            // redirect
            Session::flash('message', 'Successfully created the comment!');
            return Redirect::to('workshop/'.Input::get('fk_workshop'));
        }
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
