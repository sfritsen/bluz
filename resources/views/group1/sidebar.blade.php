<div class="logo">
    <a class="logo_text" href="{{ url('/') }}">
        <i class="fas fa-leaf logo_icon"></i> {{ config('app.name', 'Laravel') }}
    </a>
</div>

<div class="sidebar_group">
    <div class="sidebar_title"><i class="far fa-chart-bar icon"></i> My Stats</div>
    <div class="sidebar_item">{{ $counter }}</div>
</div>
<div class="sidebar_group">
    <hr class="sidebar_break">
    <a href="{!! url('/g1_entry'); !!}" class="nounderline"><div class="sidebar_item">Entry Form</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">My History</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Abandon</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">My Surveys</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">My QCE</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Time Mgnt</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Auto Echo</div></a>
</div>
<div class="sidebar_group">
    <hr class="sidebar_break">
    <div class="sidebar_title"><i class="fas fa-lock icon"></i> Admin</div>
    <a href="" class="nounderline"><div class="sidebar_item">Main</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Entry History</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Activity Monitor</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Data Search</div></a>
</div>