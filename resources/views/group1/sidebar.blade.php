<div class="logo">
    <a class="logo_text" href="{{ url('/') }}">
        <i class="fas fa-leaf logo_icon"></i> {{ config('app.name', 'Laravel') }}
    </a>
</div>

<div class="sidebar_group">
    <div class="sidebar_title"><i class="far fa-chart-bar icon"></i> My Stats</div>
    <div class="sidebar_item sidebar_count">{{ $entry_count }}</div>
</div>
<div class="sidebar_group">
    <hr class="sidebar_break">
    <a href="{!! url('/g1_entry'); !!}" class="nounderline"><div class="sidebar_item">Entry Form</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">History</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Abandon</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Surveys</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">QCE</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Time Mgnt</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Echo</div></a>
</div>
<div class="sidebar_group">
    <hr class="sidebar_break">
    <div class="sidebar_title"><i class="fas fa-lock icon"></i> Admin</div>
    <a href="" class="nounderline"><div class="sidebar_item">Main</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Entry History</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Activity</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Search</div></a>
</div>