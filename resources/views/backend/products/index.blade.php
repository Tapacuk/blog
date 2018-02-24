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
											 	<tbody>
													 	<tr>
													 			@if(!is_null($products))
													 			
													 			@foreach($products as $product)
																 <td>{{ $product->id }}</td>
																 <td><a href="/market/{{ $product->slug }}">{{ $product->name }}</a></td>
																 <td>{{ $product->description }}</td>
																 <td>{{ $product->priceText }}</td>
																 @endforeach
																 
																 @else
																 <td>Empty</td>
																 <td>Empty</td>
																 <td>Empty</td>
																 <td>Empty</td>
																 @endif
													 	</tr>
											 	</tbody>
									 	</table>
								</div> 	
						</div>
				</div>
		</div>									 
@endsection