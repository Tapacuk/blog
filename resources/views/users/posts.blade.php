@extends('home')

@section('content')
		<div class="container" style="margin-top:75px;">
				<div class="row banner">
						<div class="col-md-12">
								<div class="panel panel-default">
										<div class="panel-heading">
												<h1>Posts of <strong>{{ $user->name }}</strong></h1>
										</div>
								</div>
								@if(session('status'))
										<div class="alert alert-success">
												{{ session('status') }}
										</div>
								@endif
								@foreach($errors->all() as $error)
										<p class="alert alert-danger">{{ $error }}</p>
								@endforeach
								@if($posts->isEmpty())
									 <p>There is no post.<p>
								@endif
								@foreach($posts as $post)
								<div class="panel panel-default">
										<div class="panel-heading"><h2><a href="/users/posts/{{ $post->id }}/edit">{!! $post->title !!}</a> - @if($post->status == 1) <font color="green">Approved</font>
										@else <font color="red">Disapproved</font> @endif </h2>
										<h6>{{ $post->created_at }}</h6>
										<h6>{{ $post->created_at->diffForHumans() }}</h6></div>
										<div class="panel-body">
											<img src="/uploads/avatars_blog/{{ $post->avatar }}" style="width:100%;height:300px;">
											<h3>	{!! mb_substr($post->content, 0, 500) . "..." !!}
											</h3>
								</div>
								@endforeach		
						</div>
				</div>
		</div>
@endsection