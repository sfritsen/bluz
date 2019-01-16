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
                <i class="{!! config('icon_ref.entry_form') !!} sidebar_icon"></i>
                Entry Form
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! url('/g1_history'); !!}">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.history') !!} sidebar_icon"></i>
                History
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.abandon') !!} sidebar_icon"></i>
                Abandon
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.survey') !!} sidebar_icon"></i>
                Surveys
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.quality') !!} sidebar_icon"></i>
                QCE
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.time_mgnt') !!} sidebar_icon"></i>
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
                <i class="{!! config('icon_ref.admin_main') !!} sidebar_icon"></i>
                Main
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('g1_admin_history') }}">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.history') !!} sidebar_icon"></i>
                Entry History
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/g1_cat_boxes/1/0') }}">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.category_boxes') !!} sidebar_icon"></i>
                Category Boxes
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/g1_dd_menus/0') }}">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.drop_menus') !!} sidebar_icon"></i>
                Menus
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">
            <div class="sidebar_item">
                 <i class="{!! config('icon_ref.stats') !!} sidebar_icon"></i>
                Statistics
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('g1_admin_search') }}">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.search') !!} sidebar_icon"></i>
                Search
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('g1_admin_users') }}">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.users') !!} sidebar_icon"></i>
                Users
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('g1_admin_settings') }}">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.settings') !!} sidebar_icon"></i>
                Settings
            </div>
        </a>
    </li>
</ul>