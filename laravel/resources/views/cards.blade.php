@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col s6 offset-l3">
            <div class="card horizontal">
                <div class="card-stacked">
                    <form method="POST" action="{{url('/card/add')}}">
                        @csrf
                    <div class="card-content">
                        <div class="input-field">
                            <input placeholder="Placeholder" name="title" id="first_name" type="text" class="validate">
                            <label for="first_name">Card Title</label>
                        </div>                    </div>
                    <div class="card-action">
                        <button type="submit" class="waves-effect waves-light btn">Add card</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        @foreach($cards as $card)
        <div class="col s4">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <p>{{$card->name}}</p>
                    </div>
                    <div class="card-action">
                        <a href="{{route('tasks',["id" => $card->id])}}" class="waves-effect waves-light btn">details</a>

                        <p class="text-muted">{{$card->created_at}}</p>
                    </div>
                </div>
            </div>
        </div>
            @endforeach

    </div>
@endsection
