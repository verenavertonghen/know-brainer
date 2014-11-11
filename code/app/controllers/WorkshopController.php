<?php

class WorkshopController extends BaseController
{

    protected $workshop;

    public function __construct(Workshop $workshop)
    {
        $this->workshop = $workshop;
    }

    public function all()
    {
        //check if ADMIN is logged in
        if (Auth::check()) {
            //return all workshops with pagination
            $workshops = $this->workshop->with('user')->paginate(1);
            $view = View::make('workshops.show')->with('workshops', $workshops);
        }

        else {
            $view = Redirect::to('/');
        }
        
        return $view;
    }

    public function index()
    {
        $workshops = $this->workshop->orderBy('created_at', 'DESC')->get();
        return View::make('workshops.index')->with('workshops', $workshops);
    }

    
    public function create()
    {
        return View::make('workshops.create');
    }

    //post action om effectief te storen
    public function store()
    {
        $rules = [
            'title'                 => 'required',
            'description'           => 'required',
            'category'              => 'required',
            'location'              => 'required',
            'time'                  => 'required',
            'date'                  => 'required',
            'duration'              => 'required',
            'subscribers_amount'    => 'required'
        ];

        if (!$this->workshop->isValid(Input::all(), $rules)) {
            return Redirect::back()
                            ->withInput()
                            ->withErrors($this->workshop->getMessages());
        } 
        else {

            $workshop = new Workshop;

            $destinationPath = '';
            $filename        = '';

            if (Input::hasFile('image')) {
                $file               = Input::file('image');
                $destinationPath    = 'img/uploads/workshops/';
                $filename           = str_random(6) . '_' . $file->getClientOriginalName();
                $uploadSuccess      = $file->move($destinationPath, $filename);
                $workshop->picture  = '/'.$destinationPath.$filename;   
            }
            
            $workshop->title                = Input::get('title');
            $workshop->description          = Input::get('description');
            $workshop->category             = Input::get('category');
            $workshop->location             = Input::get('location');
            $workshop->date                 = DateTime::createFromFormat('d/m/Y',Input::get('date'));
            $workshop->time                 = DateTime::createFromFormat('H:i',Input::get('time'));
            $workshop->duration             = DateTime::createFromFormat('i',Input::get('duration'));
            $workshop->requirements         = Input::get('requirements');
            $workshop->foreknowledge        = Input::get('foreknowledge');
            $workshop->subscribers_amount   = Input::get('subscribers_amount');
            $workshop->fk_user              = Auth::user()->id;

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
        if(Auth::check()){
        //check if course owner
            $workshop = $this->workshop->find($id);
            if (Auth::user()->id === $workshop->user->id || Auth::user()->role === 0) {
                //show edit form
                $view = View::make('workshops.edit')->with('workshop', $workshop);
            }
            else {
                $view = Redirect::to('/');
            }
        }
        else {
            $view = Redirect::to('/');
        }

        return $view;

    }

    //edit form submit action
    public function update($id)
    {
        $workshop = $this->workshop->find($id);
        if (Auth::user()->id === $workshop->user->id || Auth::user()->role === 0) {
            //check if course owner

        $rules = [
            'title'                 => 'required',
            'description'           => 'required',
            'category'              => 'required',
            'location'              => 'required',
            'time'                  => 'required',
            'date'                  => 'required',
            'duration'              => 'required',
            'subscribers_amount'    => 'required'
        ];

        if (!$this->workshop->isValid(Input::all(), $rules)) {
            return Redirect::back()->withInput()->withErrors($this->workshop->getMessages());
        } else {

            $workshop = Workshop::find($id);

            $destinationPath = '';
            $filename        = '';

            if (Input::hasFile('image')) {
                $file               = Input::file('image');
                $destinationPath    = 'img/uploads/workshops/';
                $filename           = str_random(6) . '_' . $file->getClientOriginalName();
                $uploadSuccess      = $file->move($destinationPath, $filename);
                $workshop->picture  = '/'.$destinationPath.$filename;   
            }

            $workshop->title                = Input::get('title');
            $workshop->description          = Input::get('description');
            $workshop->category             = Input::get('category');
            $workshop->location             = Input::get('location');
            $workshop->date                 = DateTime::createFromFormat('d/m/Y',Input::get('date'));
            $workshop->time                 = DateTime::createFromFormat('H:i',Input::get('time'));
            $workshop->duration             = DateTime::createFromFormat('i',Input::get('duration'));
            $workshop->requirements         = Input::get('requirements');
            $workshop->foreknowledge        = Input::get('foreknowledge');
            $workshop->subscribers_amount   = Input::get('subscribers_amount');
            $workshop->fk_user              = Auth::user()->id;

            $workshop->save();
        }

        return Redirect::to('/workshop');
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

    //subscribe action
    public function subscribe($id)
    {
        $workshop = $this->workshop->find($id);
        //check workshop niet vol
        if (Auth::check() 
            && $workshop->subscribers()->count() < $workshop->subscribers_amount
            && $workshop->subscribers()->find(Auth::user()->id) == null 
            && Auth::user()->id !== $workshop->user->id) {
            
            $user = User::find(Auth::user()->id);

            $workshop->subscribers()->attach($user);
            $message = "Subscribed sucessfully";
            return Redirect::back()->with($message);
        } else {
            $message = "Could not subscribe";
            return Redirect::back()->with($message);
        }

    }

    public function unsubscribe($id)
    {
        $workshop = $this->workshop->find($id);

        if (Auth::check() && $workshop->subscribers()->find(Auth::user()->id) != null) {
            $user = User::find(Auth::user()->id);
            $workshop->subscribers()->detach($user);
            $message = "Unsubscribed sucessfully";
            return Redirect::back()->with($message);

        } else {
            $message = "Could not unsubscribe";
            return Redirect::back()->with($message);
        }

    }
}
