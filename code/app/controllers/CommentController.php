<?php

class CommentController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

    /*
    protected $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function all()
    {
        //check if ADMIN is logged in
        if (Auth::check()) {
            //return all workshops with pagination
            $comments = $this->comment->with('user')->paginate(10);
            $view = View::make('workshop.detail')->with('comments', $comments);
        } else {
            $view = Redirect::to('/');
        }

        return $view;
    }
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
		if(Auth::check() && Auth::user()->role === 0){
			$comment = Comment::find($id);
			if($comment){
				$workshop_id = $comment->fk_workshop;
				if ($comment->delete()) {
					return Redirect::to('/workshop/'.$workshop_id);
		    	}
			}
		}	
	}
}
