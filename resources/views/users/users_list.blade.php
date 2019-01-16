@extends('layouts.app')

@section('sidebar')
    @include('group1/sidebar')
@endsection

@section('content')

    <div class="container-fluid nopadding">
        <div class="row">
            <div class="col">
                
				<table class="table table-hover data_table">
					<thead>
						<tr>
							<th scope="col">Username</th>
							<th scope="col">Name</th>
							@if($config['show_email'] === '1')
								<th scope="col">Email</th>
							@endif
							@if($config['show_users_col'] === '1')
								<th scope="col">Users</th>
							@endif
							@if($config['show_admin_col'] === '1')
								<th scope="col">Admin</th>
							@endif
							@if($config['show_created_time'] === '1')
								<th scope="col">Created</th>
							@endif
							@if($config['show_updated_time'] === '1')
								<th scope="col">Updated</th>
							@endif
							@if($config['show_controls'] === '1')
								<th scope="col"></th>
							@endif
						</tr>
					</thead>
					<tbody>
						@foreach($users_list as $key => $value)
							<tr>
								<td>{{ $value['username'] }}</td>
								<td>{{ $value['name'] }}</td>
								@if($config['show_email'] === '1')
									<td>{{ $value['email'] }}</td>
								@endif
								@if($config['show_users_col'] === '1')
									<td>
										@if($value['user_management'] === 1)
											{!! config('constants.checkmark') !!}
										@else
											{!! config('constants.table_record_blank') !!}
										@endif
									</td>
								@endif
								@if($config['show_admin_col'] === '1')
									<td>
										@if($value[$admin_route] === 1)
											{!! config('constants.checkmark') !!}
										@else
											{!! config('constants.table_record_blank') !!}
										@endif
									</td>
								@endif
								@if($config['show_created_time'] === '1')
									<td>{{ $value['created_at'] }}</td>
								@endif
								@if($config['show_updated_time'] === '1')
									<td>{{ $value['updated_at'] }}</td>
								@endif
								@if($config['show_controls'] === '1')
									<td align="right">
										{{-- Icons are set in config/icon_ref.php --}}
										<i class="{!! config('icon_ref.edit') !!} table_icon" title="Edit User"></i>
										<i href="" data-remote="false" class="{!! config('icon_ref.info') !!} table_icon" title="User Details" data-toggle="modal" data-target="#entry_details_modal"></i>
									</td>
								@endif
							</tr>
						@endforeach
					</tbody>
				</table>
				
            </div>
        </div>
    </div>

@endsection