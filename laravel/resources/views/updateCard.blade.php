<div id="modal1" class="modal">

    <form method="post"  action="{{url('/cards/update')}}">
        @csrf
        @method('PUT')

        <div class="modal-content">
        <div class="input-field">
            <input placeholder="Placeholder" name="title" id="first_name" type="text" class="validate">
            <input  name="cardId" value="{{$card->id}}" type="hidden" class="validate">
            <label for="first_name">Card Title</label>
        </div>

    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-close waves-effect waves-green btn-flat">Update</button>
    </div>
    </form>
</div>
