<div id="modal2" class="modal">

    <form method="post"  action="{{url('/card/details')}}">
        @csrf

        <div class="modal-content">
            <div class="input-field">
                <input placeholder="Placeholder" name="description" id="first_name" type="text" class="validate">
                <input  name="card_id" value="{{$card->id}}" type="hidden" class="validate">
                <label for="first_name">Card Title</label>
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-close waves-effect waves-green btn-flat">Update</button>
        </div>
    </form>
</div>
