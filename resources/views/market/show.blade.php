@extends('home')

@section('content')
		<div class="container" style="margin-top:100px;">
				<div class="row">
						<div class="col-md-6">
								<h1>{{ $product->id }}</h1>
								<h1>{{ $product->name }}</h1>
								<h1>{{ $product->priceText }}</h1>
								<h1>{{ $product->description }}</h1>
						</div>
				</div>
		</div>
@endsection