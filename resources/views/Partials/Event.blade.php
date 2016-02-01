@if(Session::has('error'))
    <div class="alert alert-danger">
        <span class="glyphicon glyphicon-remove"></span> {{ Session::get('error') }}
    </div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success">
        <span class="glyphicon glyphicon-ok"></span> {{ Session::get('success') }}
    </div>
@endif

@if($errors->all())
    <div class="alert alert-danger">
        <span class="glyphicon glyphicon-exclamation-sign"></span> You have the following error(s):
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif