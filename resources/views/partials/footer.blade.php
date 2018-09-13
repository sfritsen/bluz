<div class="container">
    <div class="row footer">
        <div class="col">
            <hr>
            {{ Auth::user()->name ." (".Auth::user()->username.")" }} 
            <span class="divider">&#9679;</span> 
            {{ config('app.name', 'Laravel')." ".date("Y")}}
        </div>
    </div>
</div>