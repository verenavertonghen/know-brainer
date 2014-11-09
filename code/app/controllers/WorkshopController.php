<?php

class WorkshopController extends BaseController
{

    protected $workshop;

    public function __construct(Workshop $workshop)
    {
        $this->workshop = $workshop;
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
        if (Auth::user()->id === $workshop->user->id) {
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
