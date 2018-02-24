@extends('home')

@section('content')
		<div class="container" style="margin-top:100px;color:white;"
				<div class="row">
						<div class="col-md-12">
								<div class="panel panel-default">
										<table class="table">
											 	<thead>
													 	<tr>
															 	<th>ID</th>
															 	<th>Name</th>
															 	<th>Description</th>
															 	<th>Price</th>
													 	</tr>
											 	</thead>
											 	@if(!is_null($products))
													 			
													@foreach($products as $product)
											 	<tbody>
													 	<tr>
																 <td>{{ $product->id }}</td>
																 <td><a href="/market/{{ $product->slug }}">{{ $product->name }}</a></td>
																 <td>{{ $product->description }}</td>
																 <td>{{ $product->priceText }}</td>
													 	</tr>
											 	</tbody>
											 	@endforeach
																 
													@else
														 <p><h1>There is no products</h1>		 
												 @endif
									 	</table>
								</div> 	
						</div>
				</div>
		</div>									 
@endsection