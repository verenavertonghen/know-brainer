@extends('layouts.default')
@section('title', 'Workshop')
@section('container')

    <div class="row demo-row">
        <div class="col-xs-8">
                    <h2>Kom te weten <span>{{ $workshop->title }}</span></h2>
                    <p class="lead">Beschrijving: {{ $workshop->description }}</p>
                    <img src="{{ URL::asset($workshop->picture) }}" alt="Foto" style="width:100%;"/>
                    <br/>

                    @if(Auth::check())
                    <?php
                    $workshop_vote = Vote::where('fk_workshop', '=', $workshop->id)->where('fk_user', '=', Auth::user()->id)->get();
                    echo ($workshop_vote->isEmpty()) ? '<a class="fui-heart social-icon" href="/workshop/'.$workshop->id.'/vote">'.$votes.'<span class="icon-text lead"> Vote</span></a>' : '<a  href="/workshop/'.$workshop->id.'/vote">Unvote </a>';

                    ?>
                    @else
                        <p><a href="/login">Log in</a> of <a href="/registreer">maak een account aan</a> om deel te nemen</p>
                    @endif
                    <a class="fui-facebook social-icon "href="#"><span class="icon-text lead"> Deel dit op Facebook</span></a>
                    <a class="fui-mail social-icon" href="mailto:?subject=Workshop:Kom%20te%20weten%20{{$workshop->title }}"><span class="icon-text lead"> Mail deze workshop</span></a>
        </div>

        <div class="col-xs-4">
            <h2>Details</h2>
            <p><strong>Categorie: </strong>{{ $workshop->category }}</p>
            <p><strong>Locatie: </strong>{{ $workshop->location }}</p>
            <p><strong>Max. aantal personen: </strong>{{ $workshop->subscribers_amount }}</p>
            <p><strong>Wanneer: </strong>{{ $workshop->date }}</p>
            <p><strong>Om hoe laat: </strong>{{ $workshop->time }}</p>
            <p><strong>Duur: </strong>{{ $workshop->duration }}</p>
            <p><strong>Benodigdheden: </strong>{{ $workshop->requirements }}</p>
            <p><strong>Voorkennis: </strong>{{ $workshop->foreknowledge }}</p>

            <div class="detail-btn">
            <a class="btn btn-small btn-success" href="/workshop/{{$workshop->id}}/subscribe">subscribe</a>
            </div>
            <div class="detail-btn">
            <a class="btn btn-small btn-danger" href="/workshop/{{$workshop->id}}/unsubscribe">unsubscribe</a>
            </div>
            <div class="detail-btn">
            <a class="btn btn-small btn-info" href="/workshop/{{ $workshop->id }}/edit">Bewerk uw workshop</a>
            </div>

        </div>
    </div>

    <div class="row demo-row">
        <h2>Organisator</h2>
        <div class="row">
            <div id="workshop-user">
            <div class="col-xs-2">
                   <img class="img-circle" src="{{$workshop->user->avatar}}" width="150px" alt=""/>
            </div>
            <div class="col-xs-10">
                <strong><p>{{ $workshop->user->username }}</p></strong>
                <p><span  class="lead">{{ $workshop->user->about }}</span>
                <br/>
                </p>
                <p>{{ ($workshop->user->facebook == '') ? '' : '<a  class="btn btn-small btn-info" href="http://www.facebook.com/'.$workshop->user->facebook.'" target="_blank" class="fb-btn btn btn-info btn-lg btn-block">Facebook</a>' }}</p>
            </div>
            </div>
        </div>
    </div>

    <div class="row demo-row">
    @if(count($workshop->subscribers) > 0)
        <h5>Deelnemers</h5>
        <div class="row">
        @foreach($workshop->subscribers as $subscriber)

            <div id="workshop-user">
            <div class="col-xs-1">
                   <img class="img-circle" src="{{$subscriber->avatar}}" width="75px" alt=""/>
            </div>
            <div class="col-xs-1">
                <p>{{ $subscriber->username  }}</p>
            </div>
            </div>

        @endforeach
        </div>
    @endif
    </div>

    <hr>

    <div id="comments">
        <h2>Reacties</h2>
        @if(Auth::check())
            {{ Form::open(array('action' => 'CommentController@store')) }}

            <div class="form-group">
            {{ Form::textarea('comment', Input::old('comment'), array('class' => 'form-control','placeholder' =>'Laat weten wat je ervan vindt')) }}
            {{ Form::hidden('fk_workshop', Request::segment(2)) }}
            </div>

            {{ Form::submit('Reageren', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}

        @else
            <p><a href="/login">Log in</a> om een reactie toe te voegen.</p>
        @endif
        <br/>
        @if(!$comments->isEmpty())
            @foreach($comments as $key => $value)
        <div class="comment-div">
            <div class="row">
                <div class="col-xs-2">
                    <div id="comment">
                       <img class="img-circle" src="{{$value->user->avatar}}" width="125px" alt=""/>
                    </div>
                </div>
                <div class="col-xs-9">
                    <a class="lead" href="/users/{{ $value->user->id }}">{{ $value->user->username }}</a>
                    <p><strong>{{ $value->comment }}</strong>
                    <br/>
                    <small class="text-muted">{{ $value->created_at->format('d M Y H:i') }}</small>
                    </p>
                </div>
                <div class="col-xs-1">
                @if(Auth::check() && Auth::user()->role === 0)
                    <a href="comment/{{ $value->id }}/destroy">Verwijder</a>
                @endif
                </div>
            </div>

        </div>
            @endforeach
        @else
            <p>Er heeft nog niemand een reactie geplaatst.</p>
        @endif

        <!--
        <div class="pagination">

        </div>
        -->
    </div>
    </div>
<br>
@stop