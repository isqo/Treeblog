@if(count($errors))
    <div class="toast toast-error">
        <button class="btn btn-clear float-right" onclick="$(this).parent().fadeOut();"></button>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif