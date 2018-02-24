@extends('home')

@section('content')
		<div class="container" style="margin-top:100px;">
				<div class="row">
						<div class="col-md-12">
								<div class="panel panel-default">
										<div class="panel-heading">
												<h1>Product #{{ $product->id }}</h1>
										</div>
										<div class="panel-body">
												<div class="col-md-6">
														<img src="/uploads/market/{{ $product->avatar }}"><br>
														<h3 style="display:inline-block;">Price: <font style="font-family:Courier New, monospace;">{{ $product->priceText }}</font></h3>
														<button type="submit" class="btn btn-warning"><i class="fas fa-shopping-cart fa-3x"></i></button>
												</div>
												<div class="col-md-6">
														<div class="panel-heading">
																<h2>Product description:</h2>
														</div>
														<h3 style="font-family: Verdana, Arial, Helvetica, sans-serif;font-style: italic;">{{ $product->description }}</h3>
												</div>
										</div>		
								</div>
						</div>
				</div>
		</div>
@endsection