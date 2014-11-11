<?php

class VoteController extends \BaseController {


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function store($id)
	{
		//check of er al een 'vote'-row bestaat met ingelogde user- EN geselecteerde post-id
		$post = Vote::where('fk_workshop', '=', $id)->where('fk_user', '=', Auth::user()->id)->get();
		
		//zoniet, aanmaken.
		if($post->isEmpty()){
			$vote = new Vote;
			$vote->fk_user = Auth::user()->id;
			$vote->fk_workshop = $id;
			$vote->save();
		}
		//zowel, verwijderen
		else{
			$vote = Vote::find($post[0]->id);
			$vote->delete();
		}
		return Redirect::to('/workshop/'.$id);
	}


}
