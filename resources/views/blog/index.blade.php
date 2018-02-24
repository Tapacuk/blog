@extends('home')

@section('content')
		<div class="container col-md-8" style="margin-top:100px;">
		
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
				@else
						@foreach($posts as $post)
								@if($post->status)
								<div class="panel panel-default">
										<div class="panel-heading"><a href="{!! action('BlogController@show', $post->slug) !!}"><h2>{!! $post->title !!}</h2></a>
										<h6>{{ $post->created_at }}</h6>
										<h6>{{ $post->created_at->diffForHumans() }}</h6></div>
										<div class="panel-body">
											<img src="/uploads/avatars_blog/{{ $post->avatar }}" style="width:100%;height:300px;">
											<h3>	{!! mb_substr($post->content, 0, 500) . "..." !!}
											</h3>
										</div>
								</div>
								@endif
						@endforeach
				@endif
		</div>
		
		<div class="col-md-2 container" style="margin-top:55px;">
				<table class="table table-bordered" style="color:white;">
						<thead>
								<tr>
										<th>Last articles</th>
								</tr>
						</thead>
						<tbody>
										@foreach($articles as $article)
												@if($article->status)
												<tr>
														<td><a href="{!! action('BlogController@show', $article->slug) !!}">{!! $article->title !!}</td></br>
												</tr>
												@endif		
										@endforeach
						</tbody>	
				</table>
				@if(Auth::user())
				<a href="{{ url('/bloggers/create') }}" class="btn btn-primary" style="width:100%;">Create new post</a>
				@endif
				<form method="post">
						
						{{ csrf_field() }}
						
						<div class="form-group" style="margin-top:20px;">
					  <label for="search" style="color:white;">Search:</label>
					  <input type="text" class="form-control" name="search" style="margin-bottom:10px;">
					  <button type="submit" class="btn btn-success">Search</button>
						</div>
				</form>
		</div>																
@endsection