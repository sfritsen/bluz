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
                {{-- <i class="material-icons md-18">dashboard</i> --}}
                <i class="fab fa-wpforms sidebar_icon"></i>
                Entry Form
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! url('/g1_history'); !!}">
            <div class="sidebar_item">
                {{-- <i class="material-icons md-18">history</i> --}}
                <i class="fas fa-history sidebar_icon"></i>
                History
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                {{-- <i class="material-icons md-18">remove_circle_outline</i> --}}
                <i class="fas fa-ban sidebar_icon"></i>
                Abandon
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                {{-- <i class="material-icons md-18">question_answer</i> --}}
                <i class="far fa-question-circle sidebar_icon"></i>
                Surveys
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                {{-- <i class="material-icons md-18">done_all</i> --}}
                <i class="fas fa-check-double sidebar_icon"></i>
                QCE
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                {{-- <i class="material-icons md-18">timeline</i> --}}
                <i class="far fa-clock sidebar_icon"></i>
                Time Mgnt
            </div>
        </a>
    </li>
</ul>

<hr class="sidebar_break">
<div class="sidebar_title">Administration</div>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/g1_admin') }}">
            <div class="sidebar_item">
                {{-- <i class="material-icons md-18">bubble_chart</i> --}}
                <i class="fas fa-unlock-alt sidebar_icon"></i>
                Main
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('g1_admin_history') }}">
            <div class="sidebar_item">
                {{-- <i class="material-icons md-18">history</i> --}}
                <i class="fas fa-history sidebar_icon"></i>
                Entry History
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/g1_cat_boxes/1/0') }}">
            <div class="sidebar_item">
                {{-- <i class="material-icons md-18">menu</i> --}}
                <i class="fas fa-bars sidebar_icon"></i>
                Category Boxes
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/g1_dd_menus/0') }}">
            <div class="sidebar_item">
                {{-- <i class="material-icons md-18">arrow_downward</i> --}}
                <i class="fas fa-sort-amount-down sidebar_icon"></i>
                Menus
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">
            <div class="sidebar_item">
                {{-- <i class="material-icons md-18">bar_chart</i> --}}
                <i class="far fa-chart-bar sidebar_icon"></i>
                Statistics
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('g1_admin_search') }}">
            <div class="sidebar_item">
                {{-- <i class="material-icons md-18">search</i> --}}
                <i class="fas fa-search sidebar_icon"></i>
                Search
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('g1_admin_users') }}">
            <div class="sidebar_item">
                {{-- <i class="material-icons md-18">people</i> --}}
                <i class="fas fa-user-friends sidebar_icon"></i>
                Users
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('g1_admin_settings') }}">
            <div class="sidebar_item">
                {{-- <i class="material-icons md-18">settings</i> --}}
                <i class="fas fa-cog sidebar_icon"></i>
                Settings
            </div>
        </a>
    </li>
</ul>