<div class="container">
    <div class="row footer">
        <div class="col">
            <hr>
            {{ Auth::user()->name }} 
            <span class="divider">{!! config('constants.divider') !!}</span>
            <a href="{{ url('/logout') }}">Logout</a>
            <span class="divider">{!! config('constants.divider') !!}</span> 
            {{ config('app.name', 'Laravel')." ".date("Y")}}
        </div>
    </div>
</div>