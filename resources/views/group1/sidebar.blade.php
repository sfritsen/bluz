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

<hr class="sidebar_break">
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="{!! url('/g1_entry'); !!}">
            <div class="sidebar_item">
                <i class="material-icons md-18">dashboard</i>
                Entry Form
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! url('/g1_history'); !!}">
            <div class="sidebar_item">
                <i class="material-icons md-18">history</i>
                History
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                <i class="material-icons md-18">feedback</i>
                Abandon
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                <i class="material-icons md-18">question_answer</i>
                Surveys
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                <i class="material-icons md-18">format_quote</i>
                QCE
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                <i class="material-icons md-18">timeline</i>
                Time Mgnt
            </div>
        </a>
    </li>
</ul>

<hr class="sidebar_break">
<div class="sidebar_title">Administration</div>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                <i class="material-icons md-18">lock</i>
                Main
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                <i class="material-icons md-18">assessment</i>
                Entry History
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/g1_cat_boxes/1/0') }}">
            <div class="sidebar_item">
                <i class="material-icons md-18">menu</i>
                Category Boxes
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/g1_dd_menus/0') }}">
            <div class="sidebar_item">
                <i class="material-icons md-18">menu</i>
                Menus
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">
            <div class="sidebar_item">
                <i class="material-icons md-18">bubble_chart</i>
                Activity
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">
            <div class="sidebar_item">
                <i class="material-icons md-18">search</i>
                Search
            </div>
        </a>
    </li>
</ul>