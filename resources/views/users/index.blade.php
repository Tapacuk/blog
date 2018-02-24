@extends('home')

@section('content')
		<div class="container" style="margin-top:75px;">
				<div class="row banner">
						<div class="col-md-12">
								<div class="panel panel-default">
										<div class="panel-heading">
												<h1>Profile of {{ $user->name }}</h1>
												<img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px;height:150px;">
												
												@foreach($errors->all() as $error)
														<p class="alert alert-danger">{{ $error }}</p>
												@endforeach
																				
												@if(session('status'))
														<div class="alert alert-success">
																{{ session('status') }}
														</div>
												@endif
												
												@if( Auth::user() == $user)
												<form enctype="multipart/form-data" action="/profile" method="POST">
												<label>Update profile image</label>
														<input type="file" name="avatar">
														<input type="hidden" name="_token" value="{{ csrf_token() }}">
														<input type="submit">
												</form>
												@endif
										</div>
										<div class="panel panel-default">
												<div class="panel-body">
														<table class="table">
																<tbody>
																		<tr>
																				<td>ID</td>
																				<td>{{ $user->id }}</td>
																		</tr>
																		<tr>
																				<td>UserName</td>
																				<td>{{ $user->name }}</td>
																		</tr>
																		<tr>
																				<td>E-mail address</td>
																				<td>{{ $user->email }}</td>
																		</tr>
																		<tr>
																				<td>Password</td>
																				<td>******(<a href="/profile/{{ $user->id }}/pass">{{ empty($user->password) ? "Set the password" : "Change password" }}</a>)</td>
																		</tr>
																		<tr>
																				<td>Posts</td>
																				<td><a href="/users/posts/{{ $user->id }}">View all posts</a></td>	
																		</tr>		
																		<tr>
																				<td>Comments</td>
																				<td>{{ $comments }}</td>
																		</tr>
																		<tr>
																				<td>Registered</td>
																				<td>{{ $user->created_at->diffForHumans() }}</td>
																		</tr>		
																</tbody>
														</table>
												</div>
										</div>		
								</div>		
						</div>
				</div>
		</div>										
@endsection