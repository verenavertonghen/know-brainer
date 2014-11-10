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
        $workshops = $this->workshop->orderBy('created_at', 'DESC')->get();
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
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'location' => 'required',
            'time' => 'required',
            'date' => 'required',
            'duration' => 'required',
            'subscribers_amount' => 'required'
        ];

        if (!$this->workshop->isValid(Input::all(), $rules)) {
            return Redirect::back()->withInput()->withErrors($this->workshop->getMessages());
        } else {

            $workshop = new Workshop;

            $destinationPath = '';
            $filename        = '';

            if (Input::hasFile('image')) {
                $file            = Input::file('image');
                $destinationPath = 'img/uploads/workshops/';
                $filename        = str_random(6) . '_' . $file->getClientOriginalName();
                $uploadSuccess   = $file->move($destinationPath, $filename);
                $workshop->picture    = '/'.$destinationPath.$filename;   
            }


            
            $workshop->title = Input::get('title');
            $workshop->description = Input::get('description');
            $workshop->category = Input::get('category');
            $workshop->location = Input::get('location');
            $workshop->date = DateTime::createFromFormat('d/m/Y',Input::get('date'));
            $workshop->time = DateTime::createFromFormat('H:i',Input::get('time'));
            $workshop->duration = DateTime::createFromFormat('i',Input::get('duration'));
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
            $comments = Comment::where('fk_workshop', '=', $id)->with('user')->get();
            $view = View::make('workshops.detail')->with('workshop', $workshop)->with('user')->with('comments', $comments);
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
