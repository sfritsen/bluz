<div class="container">
    <div class="row footer">
        <div class="col">
            <hr>
            {{ Auth::user()->name }} 
            <span class="divider">&#9679;</span>
            <a href="{{ url('/logout') }}">Logout</a>
            <span class="divider">&#9679;</span> 
            {{ config('app.name', 'Laravel')." ".date("Y")}}
        </div>
    </div>
</div>