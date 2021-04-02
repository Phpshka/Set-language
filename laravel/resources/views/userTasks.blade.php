@extends('layout.app')
@section('content')
    <div class="row">
        @foreach($user->tasks as $task)
            <div class="col s4">
                <div class="card horizontal">
                    <div class="card-stacked">
                        <div class="card-content">
                            <p>{{$task->name}}</p>
                        </div>
                        <div class="card-action">
                            <a href="{{route('tasks',["id" => $task->id])}}" class="waves-effect waves-light btn">details</a>

                            <p class="text-muted">{{$task->created_at}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
