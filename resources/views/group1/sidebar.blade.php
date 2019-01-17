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
                <i class="{!! config('icon_ref.entry_form') !!} fa-fw sidebar_icon"></i>
                Entry Form
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{!! url('/g1_history'); !!}">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.history') !!} fa-fw sidebar_icon"></i>
                History
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" id="open_abandon_modal" data-toggle="modal" data-target="#abandon_modal">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.abandon') !!} fa-fw sidebar_icon"></i>
                Abandon
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.survey') !!} fa-fw sidebar_icon"></i>
                Surveys
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.quality') !!} fa-fw sidebar_icon"></i>
                QCE
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.time_mgnt') !!} fa-fw sidebar_icon"></i>
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
                <i class="{!! config('icon_ref.admin_main') !!} fa-fw sidebar_icon"></i>
                Main
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('g1_admin_history') }}">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.history') !!} fa-fw sidebar_icon"></i>
                Entry History
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/g1_cat_boxes/1/0') }}">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.category_boxes') !!} fa-fw sidebar_icon"></i>
                Category Boxes
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/g1_dd_menus/0') }}">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.drop_menus') !!} fa-fw sidebar_icon"></i>
                Menus
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">
            <div class="sidebar_item">
                 <i class="{!! config('icon_ref.stats') !!} fa-fw sidebar_icon"></i>
                Statistics
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('g1_admin_search') }}">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.search') !!} fa-fw sidebar_icon"></i>
                Search
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('g1_admin_users') }}">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.users') !!} fa-fw sidebar_icon"></i>
                Users
            </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('g1_admin_settings') }}">
            <div class="sidebar_item">
                <i class="{!! config('icon_ref.settings') !!} fa-fw sidebar_icon"></i>
                Settings
            </div>
        </a>
    </li>
</ul>

{{-- Including abandon modal --}}
@include('group1/modal_abandon')

{{-- Used to append the modal to parent.  Prevents it from being behind backdrop --}}
<script>
$("#open_abandon_modal").click(function(){
    $('#abandon_modal').appendTo("body").modal('show');
});
</script>