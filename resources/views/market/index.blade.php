@extends('home')

@section('content')
		<div class="container" style="margin-top:100px;color:white;">
				<div class="row">
						@if(!is_null($products))
						
								@foreach($products as $product)
										<div class="col-md-4" style="margin-top:20px;">
												<a href="/market/{{ $product->slug }}"><img src="/uploads/market/default.png" style="border-radius:30%;width:300px;height:300px;opacity:0.7;" alt="{{ $product->name }}"></a>
												<h3 style="display:inline-block;">Price: <font style="font-family:Courier New, monospace;">{{ $product->priceText }}</font></h3>
												<button type="submit" class="btn btn-warning" style="margin-left:40px;"><i class="fas fa-shopping-cart fa-3x"></i></button>
										</div>
								@endforeach
						
						@else
								<p><h1>There are no products yet :(</h1></p>
						@endif			 		
				</div>
		</div>
@endsection