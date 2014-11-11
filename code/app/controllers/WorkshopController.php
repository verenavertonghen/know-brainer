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
            $workshops = $this->workshop->with('user')->paginate(10);
            $view = View::make('workshops.show')->with('workshops', $workshops);
        } else {
            $view = Redirect::to('/');
        }

        return $view;
    }

    public function index()
    {
        //$workshops = $this->workshop->orderBy('created_at', 'DESC')->get();
        $workshops = $this->workshop->with('user')->leftJoin('kb_votes', 'kb_workshops.id', '=', 'kb_votes.fk_workshop')->select('kb_workshops.*')->orderBy('kb_workshops.created_at', 'DESC')->orderBy(DB::raw('count(kb_votes.fk_workshop)'), 'DESC')->groupBy('kb_workshops.id')->get();
        //dd($workshops);
        return View::make('workshops.index')->with('workshops', $workshops);
    }


    public function create()
    {

        if (Auth::check()) {
            return View::make('workshops.create');
        } else {
            $view = Redirect::to('/login');
        }

        return $view;
    }

    //post action om effectief te storen
    public function store()
    {
        if (Auth::check()) {
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
                return Redirect::back()
                    ->withInput()
                    ->withErrors($this->workshop->getMessages());
            } else {

                $workshop = new Workshop;

                $user = User::find(Auth::user()->id);

                $destinationPath = '';
                $filename = '';

                if (Input::hasFile('image')) {
                    $file = Input::file('image');
                    $destinationPath = 'img/uploads/workshops/';
                    $filename = str_random(6) . '_' . $file->getClientOriginalName();
                    $uploadSuccess = $file->move($destinationPath, $filename);
                    $workshop->picture = '/' . $destinationPath . $filename;
                }

                $workshop->title = Input::get('title');
                $workshop->description = Input::get('description');
                $workshop->category = Input::get('category');
                $workshop->location = Input::get('location');
                $workshop->date = DateTime::createFromFormat('d/m/Y', Input::get('date'));
                $workshop->time = DateTime::createFromFormat('H:i', Input::get('time'));
                $workshop->duration = DateTime::createFromFormat('i', Input::get('duration'));
                $workshop->requirements = Input::get('requirements');
                $workshop->foreknowledge = Input::get('foreknowledge');
                $workshop->subscribers_amount = Input::get('subscribers_amount');

                $workshop->save();

                $data['username'] = Auth::user()->username;
                $data['title'] = Input::get('title');
                $data['description'] = Input::get('description');
                $data['location'] = Input::get('location');
                $data['date'] = Input::get('date');
                $data['time'] = Input::get('time');
                $data['duration'] = Input::get('duration');
                $data['category'] = Input::get('category');
                $data['subscribers_amount'] = Input::get('subscribers_amount');
                $data['requirements'] = Input::get('requirements');
                $data['foreknowledge'] = Input::get('foreknowledge');


                Mail::queue('emails.create', $data, function ($message) use ($user) {
                    $message->from('noreply@knowbrainer.be', 'Knowbrainer');
                    $message->to($user->email, $user->username)->subject('Succesvol Workshop Aangemaakt!');
                });
                return Redirect::to('/workshop');
            }
        } else {
            $view = Redirect::to('/login');
        }

        return $view;


    }

    //detail pagina 1 workshop
    public function show($id)
    {
        $workshop = $this->workshop->find($id);
       if ($workshop) {
            $comments = Comment::where('fk_workshop', '=', $id)->with('user')->get();
            $votes = Vote::where('fk_workshop', '=', $id)->count();
            $view = View::make('workshops.detail')->with('workshop', $workshop)->with('user')->with('comments', $comments)->with('votes', $votes);
        } else {
            $view = Redirect::to('/');
        }

        return $view;
    }

    //edit form laten zien
    public function edit($id)
    {
        if (Auth::check()) {
            //check if course owner
            $workshop = $this->workshop->find($id);
            if (Auth::user()->id === $workshop->user->id || Auth::user()->role === 0) {
                //show edit form
                $view = View::make('workshops.edit')->with('workshop', $workshop);
            } else {
                $view = Redirect::to('/');
            }
        } else {
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

                $workshop = Workshop::find($id);

                $destinationPath = '';
                $filename = '';

                if (Input::hasFile('image')) {
                    $file = Input::file('image');
                    $destinationPath = 'img/uploads/workshops/';
                    $filename = str_random(6) . '_' . $file->getClientOriginalName();
                    $uploadSuccess = $file->move($destinationPath, $filename);
                    $workshop->picture = '/' . $destinationPath . $filename;
                }

                $workshop->title = Input::get('title');
                $workshop->description = Input::get('description');
                $workshop->category = Input::get('category');
                $workshop->location = Input::get('location');
                $workshop->date = DateTime::createFromFormat('d/m/Y', Input::get('date'));
                $workshop->time = DateTime::createFromFormat('H:i', Input::get('time'));
                $workshop->duration = DateTime::createFromFormat('i', Input::get('duration'));
                $workshop->requirements = Input::get('requirements');
                $workshop->foreknowledge = Input::get('foreknowledge');
                $workshop->subscribers_amount = Input::get('subscribers_amount');
                $workshop->fk_user = Auth::user()->id;

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
            $message = "Je workshop werd succesvol verwijderd";
            return Redirect::back()->with($message);

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
            && Auth::user()->id !== $workshop->user->id
        ) {


            $user = Auth::user()->id;

            $workshop->subscribers()->attach($user);
            $message = "Subscribed sucessfully";

            $data['username'] = Input::get('username');
            $data['title'] = Input::get('title');
            $data['description'] = Input::get('description');
            $data['location'] = Input::get('location');
            $data['date'] = Input::get('date');
            $data['time'] = Input::get('time');
            $data['duration'] = Input::get('duration');
            $data['category'] = Input::get('category');
            $data['subscribers_amount'] = Input::get('subscribers_amount');
            $data['requirements'] = Input::get('requirements');
            $data['foreknowledge'] = Input::get('foreknowledge');


            Mail::queue('emails.subscribe', $data, function ($message) use ($user) {
                $message->from('noreply@knowbrainer.be', 'Knowbrainer');
                $message->to($user->email, $user->username)->subject('Succesvol ingeschreven!');
            });

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
