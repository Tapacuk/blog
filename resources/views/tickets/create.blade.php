@extends('home')

<html>
	@yield('header')

	@yield('navmenu')
	

	@section('content')
			<body>
				<div class="row">
						<div class="col-sm-6 col-sm-offset-3" style="margin-top:100px;color:white;">
		    		<h3>Send me a message</h3>
		    				<form role="form" id="contactForm" method="post">
		    							@foreach ($errors->all() as $error)
		    									<p class="alert alert-danger">{{ $error }}</p>
		    							@endforeach
		    							@if (session('status'))
		    									<div class="alert alert-success">
		    											{{ session('status') }}
		    									</div>		
		    							@endif				  
													<div class="row">
			            <div class="form-group col-sm-6">
			            		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			              <label for="name" class="h4">Name</label>
			              <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" required>
			            </div>
			            <div class="form-group col-sm-6">
			                <label for="email" class="h4">Email</label>
			                <input type="email" class="form-control" id="email" placeholder="Enter email" required>
			            </div>
			        		</div>
			        		<div class="form-group">
			            <label for="message" class="h4 ">Message</label>
			            <textarea id="message" name="message" class="form-control" rows="5" placeholder="Enter your message" required></textarea>
			        		</div>
			        		<button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>
													<div id="msgSubmit" class="h3 text-center hidden">Message Submitted!			</div>
		    				</form>
						</div>
				</div>			
			</body>
	@endsection()

</html>