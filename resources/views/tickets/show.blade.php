@extends('home')

@section('content')
		<div class="container col-md-8 col-md-offset-2" style="margin-top:100px;box-shadow: 0 0 10px rgba(0,0,0,0.5);">
				<div class="well well bs-component">
						<div class="content">
								<h2 class="header">{!! $ticket->title !!}</h2>
								<p><strong>Status</strong>: {!! $ticket->status ? 'Pending' : 'Answered' !!}</p>
								<p> {!! $ticket->content !!}</p>
						</div>
						<a href="{!! action('TicketsController@edit', $ticket->slug) !!}" class="btn btn-info pull-left">Edit</a>
						<form method="post" action="{!! action('TicketsController@destroy', $ticket->slug) !!}" class="pull-left">
						
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
								<div class="form-group">
										<div>
												<button type="submit" class="btn btn-warning" style="margin-left:5px;">Delete</button>
										</div>
								</div>
						</form>
						
						<div class="clearfix"></div>
						
						@foreach ($comments as $comment)
								<div class="well well bs-component">
										<div class="content">
												{!! $comment->content !!}
										</div>
								</div>		
						@endforeach
						
						<div class="well well bs-component">
				<form class="form-horizontal" method="post" action="{{ url('/comment') }}">
				
						@foreach($errors->all() as $error)
								<p class="alert alert-danger">{{ $error }}</p>
						@endforeach
						
						@if(session('status'))
								<div class="alert alert-success">
										{{ session('status') }}
								</div>
						@endif
						
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
						<input type="hidden" name="post_id" value="{!! $ticket->id !!}">
						<input type="hidden" name="post_type" value="App\Ticket">
						
						<fieldset>
								<legend>Reply</legend>
								<div class="form-group">
										<div class="col-lg-12">
												<textarea class="form-control" rows="3" id="content" name="content"></textarea>
										</div>
								</div>
								
								<div class="form-group">
										<div class="col-lg-12">
												<button type="reset" class="btn btn-default">Cancel</button>
												<button type="submit" class="btn btn-primary">Post</button>
										</div>
								</div>
						</fieldset>
				</form>
		</div>																											
				</div>
		</div>
							
@endsection()