@extends('home')

@section('content')
		<div class="container col-md-8 col-md-offset-2" style="margin-top:100px;">
				<div class="well well bs-component">
						<div class="content">
								<h2 class="header">{!! $post->title !!}</h2>
								<h3 style="font-family:Courier New, monospace;">
										<p>{!! $post->content !!}</p>
								</h3>
						</div>
						<div class="clearfix"></div>
				</div>
				
				@if(!empty($comments))
						@foreach($comments as $comment)
								<div class="well well bs-component">
										<div class="content">
												<h3>
														{!! $comment->user_name !!}
												</h3>
												<h6>
														{!! $comment->created_at !!}
												</h6>
												<h4 style="margin-top:15px;color:#595959;font-style: oblique;">
												<a href="/profile/{{ $user->id }}"><img src="/uploads/avatars/{{ $user->avatar }}" style="width:50px;height:50px;border-radius:50%;"></a>
												{!! $comment->content !!}
												</h4>
										</div>
								</div>
						@endforeach
				@endif		
				
				@if(Auth::check())
				<div class="well well bs-component">
						<form class="form-horizontal" method="post" action="/comment">
						
								@foreach($errors->all() as $error)
										<p class="alert alert-danger">{{ $error }}</p>
								@endforeach
								
								@if(session('status'))
										<div class="alert alert-success">
												{{ session('status') }}
										</div>
								@endif
								
								<input type="hidden" name="_token" value="{!! csrf_token() !!}">
								<input type="hidden" name="post_id" value="{!! $post->id !!}">
								<input type="hidden" name="user_name" value="{!!	Auth::user()->name !!}">
								<input type="hidden" name="post_type" value="App\Post">
								
								
								<fieldset>
										<legend>Comment</legend>
										<div class="form-group">
												<div class="col-lg-12">
														<textarea class="form-control" rows="3" id="content" name="content" style="border: 1px solid grey;"></textarea>
												</div>
										</div>
										
										<div class="form-group">
												<div class="col-lg-12">
														<button type="reset" class="btn btn-default">Cancel</button>
														<button type="submit" class="btn btn-primary">Post</button>
												</div>
										</div>
								</fieldset>
							@else
							<div class="panel well">
									<h4><a href="{{ url('/login') }}">Log in</a> to write a comment.</h4>
							</div>
							@endif
							
						</form>
				</div>
		</div>																																
@endsection