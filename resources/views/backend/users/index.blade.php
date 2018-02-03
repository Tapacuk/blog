@extends('home')

@section('content')
		<div class="container col-md-8 col-md-offset-2") style="margin-top:100px;">
				<div class="panel panel-default">
						<div class="panel-heading">
								<h2>All Users</h2>
						</div>
						@if(session('status'))
								<div class="alert alert-success">
										{{ session('status') }}
								</div>
						@endif
						@if($users->isEmpty())
								<p>There is no user</p>
						@else
								<table class="table">
										<thead>
										<tr>
												<th>ID</th>
												<th>Name</th>
												<th>Email</th>
												<th>Joined at</th>
										</tr>
										</thead>
										<tbody>
										@foreach($users as $user)
												<tr>
														<td>{!! $user->id !!}</td>
														<td>
																<a href="{!! action('Admin\UsersController@edit', $user->id) !!}">{!! $user->name !!}</a>
														</td>
														<td>{!! $user->email !!}</td>
														<td>{!! $user->created_at !!}</td>
												</td>
										@endforeach
										</tbody>
								</table>
						@endif
				</div>
		</div>																								
@endsection