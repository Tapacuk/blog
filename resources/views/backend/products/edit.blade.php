@extends('home')

@section('content')
		<div class="container" style="margin-top:100px;">
				<div class="col-md-8 col-md-offset-2">
						<div class="well well bs-component">
								<form class="form-horizontal" enctype="multipart/form-data" method="post"> 
								
								@foreach($errors->all() as $error)
										<p class="alert alert-danger">{{ $error }}</p>
								@endforeach
								
								@if(session('status'))
										<div class="alert alert-success">
												{{ session('status') }}
										</div>
								@endif
								
								<input type="hidden" name="_token" value="{!! csrf_token() !!}">
								
								<fieldset>
								
										<legend>Update a product <i class="fab fa-product-hunt"></i></legend>
										
										<div class="form-group">
												<div class="col-lg-2">
														<label for="name" class="control-label">Name</label>
												</div>
												<div class="col-lg-10">		
														<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ $product->name }}">
												</div>
										</div>
										<div class="form-group">
												<div class="col-lg-2">
														<label for="description" class="control-label">Description</label>
												</div>
												<div class="col-lg-10">
														<textarea class="form-control" name="description" id="description" rows="3" style="resize:none;" placeholder="Description">{!! $product->description !!}</textarea>
												</div>
										</div>
										<div class="form-group">
												<div class="col-lg-2">
														<label for="priceTxt" class="control-label">Text price</label>
												</div>
												<div class="col-lg-10">		
														<input type="text" class="form-control" id="priceTxt" placeholder="Text price" name="priceTxt" value="{{ $product->priceText }}">
												</div>		
										</div>
										<div class="form-group">
												<div class="col-lg-2">
														<label for="price" class="control-label">Price</label>
												</div>
												<div class="col-lg-10">		
														<input type="text" class="form-control" id="price" placeholder="Price" name="price" value="{{ $product->price }}">
												</div>		
										</div>
										<div class="form-group">
										  <div class="col-lg-2">
										    <label for="select" class="control-label">Categories</label>
										  </div>
												<div class="col-lg-10">
														<select class="form-control" id="category" name="categories[]" multiple>
														@foreach($categories as $category)
																<option value="{!! $category->id !!}">
																		{!! $category->name !!}
																</option>
														@endforeach
														</select>
												</div>
										</div>
										<div class="form-group">
												<div class="col-lg-2">
														<label for="avatar" class="control-label">Image</label>
												</div>
												<div class="col-lg-10">
														<input type="file" name="avatar" >
												</div>
										</div>
										<div class="form-group">
												<div class="col-lg-10 col-lg-offset-2">
														<button type="reset" class="btn btn-default">Cancel</button>
														<button type="submit" class="btn btn-primary">Submit</button>
												</div>
										</div>
								</form>
						</div>
				</div>
		</div>
@endsection