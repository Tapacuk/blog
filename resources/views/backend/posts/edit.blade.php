@extends('home')

@section('content')
		<div class="container col-md-8 col-md-offset-2" style="margin-top:100px;">
				<div class="well well bs-component">
				
						<form class="form-horizontal" enctype="multipart/form-data"  method="post">
						
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
										<legend>Edit a post</legend>
										<div class="form-group">
												<label for="title" class="col-lg-2 control-label">Title</label>
												<div class="col-lg-10">
														<input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $post->title }}">
												</div>
										</div>
										<div class="form-group">
												<label for="content" class="col-lg-2 control-label">Content</label>
												<div class="col-lg-10">
														<textarea class="form-control" row="3" id="content" name="content">{!! $post->content !!}</textarea>
												</div>
										</div>
										
										<div class="form-group">
												<label for="select" class="col-lg-2 control-label">Categories</label>
												<div class="col-lg-10">
														<select class="form-control" id="categories" name="categories[]" multiple>
																@foreach($categories as $category)
																		<option value="{!! $category->id !!}" @if(in_array($category->id, $selectedCategories)) selected=" selected" @endif>{!! $category->name !!}
																		</option>
																@endforeach
														</select>
														<label>Upload image</label>
														<input type="file" name="avatar">
														<input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
												</div>
										</div>
								<div class="form-group">
          <div class="col-md-6 col-md-offset-2">
            <div class="checkbox">
            <label>
              <input type="checkbox" name="status_post" {{ old('remember') ? 'checked' : '' }}> Change status
            </label>
            </div>
          </div>
        </div>	
										<div class="form-group">
												<div class="col-lg-10 col-lg-offset-2" style="margin-top:15px;">
														<button type="reset" class="btn btn-default">Cancel</button>
														<button type="submit" class="btn btn-primary">Submit</button>
												</div>
										</div>
								</fieldset>
						</form>
				</div>
		</div>																																				
@endsection