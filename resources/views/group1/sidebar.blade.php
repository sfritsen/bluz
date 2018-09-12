@include('partials/sidebar_logo')

<div class="sidebar_group">
    <div class="sidebar_title">My Statistics</div>
    <div class="row sidebar_statistics">
        <div class="col">
            <div class="sidebar_stat_text">Today</div>
        </div>
        <div class="col">
            <div class="sidebar_stat_count">{{ $entry_count_today }}</div>
        </div>
    </div>
    <div class="row sidebar_statistics">
        <div class="col">
            <div class="sidebar_stat_text">Yesterday</div>
        </div>
        <div class="col">
            <div class="sidebar_stat_count">{{ $entry_count_yesterday }}</div>
        </div>
    </div>
</div>

<div class="sidebar_group">
    <hr class="sidebar_break">
    <div class="sidebar_title">User Menu</div>
    <a href="{!! url('/g1_entry'); !!}" class="nounderline"><div class="sidebar_item">Entry Form</div></a>
    <a href="{!! url('/g1_history'); !!}" class="nounderline"><div class="sidebar_item">History</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Abandon</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Surveys</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">QCE</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Time Mgnt</div></a>
</div>
<div class="sidebar_group">
    <hr class="sidebar_break">
    <div class="sidebar_title">Administration</div>
    <a href="" class="nounderline"><div class="sidebar_item">Main</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Entry History</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Activity</div></a>
    <a href="" class="nounderline"><div class="sidebar_item">Search</div></a>
</div>