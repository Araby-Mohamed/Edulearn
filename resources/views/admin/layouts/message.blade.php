<div>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif

    @if(Session::has('danger'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('danger')}}
        </div>
    @endif

    @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
        </div>
    @endif
</div>
