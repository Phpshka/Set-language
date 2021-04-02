@extends('layout.app')
@section('content')
    @include('updateCard')
    @include('addCardDescription')

    <div class="row">
        <div class="col s12">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">{{$card->name}}</span>
                    <p>{{$card->created_at}}</p>
                    <p>Card description: {{($card->details) ? $card->details->description : ""}}</p>
                </div>
                <div class="card-action">
                    <div class="row">
                        <div class="col s2">
                            <button class="waves-effect waves-light btn modal-trigger" href="#modal1"  type="submit">Update</button>

                        </div>
                        <div class="col s2">
                            <button class="waves-effect waves-light btn modal-trigger" href="#modal2"  type="submit">Add Details</button>

                        </div>
                        <div class="col s2">
                            <form method="POST" action="{{url('/cards/delete')}}">
                                @csrf
                                <input type="hidden" name="cardId" value="{{$card->id}}">
                                <button class="waves-effect waves-light btn" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="card blue-grey lighten-5">
                <form method="POST" action="{{url('/tasks/add')}}">
                    @csrf
                    <div class="card-content">
                        <div class="input-field">
                            <input placeholder="Placeholder" name="name"  type="text" class="validate">
                            <input  name="cardId" type="hidden" value="{{$card->id}}" class="validate">
                            <label for="first_name">Task name</label>
                        </div>                    </div>
                    <div class="card-action">
                        <button type="submit" class="waves-effect waves-light btn">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($tasks as $task)
        <div class="col s12">
            <div class="card blue-grey lighten-5">
                <div class="card-content ">
                    <span class="card-title">{{$task->name}}</span>
                    <p>{{$task->created_at}}</p>
                    <p>{{$task->card->name}}</p>
                    <strong>Task responsibles</strong>
                    @foreach($task->responsibles as $user)
                        <p>{{$user->title}}</p>
                    @endforeach
                </div>
                <div class="card-action">
                    <div class="switch">
                        <label>
                            Completed
                            <input onchange="changeStatus({{$task->id}}, {{$task->is_completed}}, {{$task->card_id}})" type="checkbox" {{($task->is_completed) ? "checked" : ""}}>
                            <span class="lever"></span>
                        </label>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
<script>

    function changeStatus(id,status, cardId){
        var newStatus = (status === 0) ? 1: 0;
        $.ajax('/task/status', {
            type: 'POST',  // http method
            data: { taskId: id, newStatus: newStatus, cardId:cardId },  // data to submit
            success: function (data, status, xhr) {
                console.log(data);
            },
            error: function (jqXhr, textStatus, errorMessage) {
            }
        });
    }
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, []);
    });

    // Or with jQuery

    $(document).ready(function(){
        $('.modal').modal();
    });

</script>
