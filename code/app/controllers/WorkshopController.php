<?php

class WorkshopController extends BaseController
{

    protected $workshop;

    public function __construct(Workshop $workshop)
    {
        $this->workshop = $workshop;
    }

    public function all(){
        if(Auth::check()){
            
                $workshops = $this->workshop->with('user')->paginate(1);
                $view = View::make('workshops.show')->with('workshops', $workshops);
        }
        else{
            $view = Redirect::to('/');
        }
        return $view;
    }

    public function index()
    {
        $workshops = $this->workshop->all();
        return View::make('workshops.index')->with('workshops', $workshops);
    }

    //form laten zien
    public function create()
    {
        return View::make('workshops.create');
    }

    //post action om effectief te storen
    public function store()
    {
        $data = array();

        $rules = [
            'title' 	        => 'required',
            'description'       => 'required',
            'category' 	        => 'required',
            'location' 	        => 'required',
            'time'              => 'required',
            'date' 	            => 'required',
            'duration' 	        => 'required',
            'requirements'      => '',
            'foreknowledge' 	=> '',
            'picture'           => '',
            'subscribers_amount'=> 'required'
        ];

        if(! $this->workshop->isValid(Input::all(), $rules)){
            return Redirect::back()->withInput()->withErrors($this->workshop->getMessages());
        }
        else{
            $workshop = new Workshop;
            $workshop->title = Input::get('title');
            $workshop->description = Input::get('description');
            $workshop->category = Input::get('category');
            $workshop->location = Input::get('location');
            $workshop->date = Input::get('date');
            $workshop->time = Input::get('time');
            $workshop->duration = Input::get('duration');
            $workshop->requirements = Input::get('requirements');
            $workshop->foreknowledge = Input::get('foreknowledge');
            $workshop->picture = Input::get('picture');
            $workshop->subscribers_amount = Input::get('subscribers_amount');
            $workshop->fk_user = Auth::user()->id;

            $workshop->save();
        }

        return Redirect::to('/workshop');
    }

    //detail pagina 1 workshop
    public function show($id)
    {
        $workshop = $this->workshop->find($id);
        if ($workshop) {
            $view = View::make('workshops.detail')->with('workshop', $workshop);
        } else {
            $view = Redirect::to('/');
        }

        return $view;
    }

    //edit form laten zien
    public function edit($id)
    {
        $workshop = $this->workshop->find($id);

        //check if course owner
        if (Auth::user()->id === $workshop->user->id || Auth::user()->role === 0) {
            //show edit form
            $view = View::make('workshops.edit')->with('workshop', $workshop);
        } else {
            $view = Redirect::to('/');
        }

        return $view;

    }

    //edit form submit action
    public function update($id)
    {
        $workshop = $this->workshop->find($id);
        if (Auth::user()->id === $workshop->user->id) {
            //check if course owner

        }
    }

    //delete submit action
    public function destroy($id)
    {
        $workshop = $this->workshop->find($id);
        if (Auth::user()->id === $workshop->user->id) {

            $workshop->delete();
            return Redirect::to('/');

        }

    }


}
