@extends('home')

@section('content')
		<div class="container" style="margin-top:100px;">
				<div class="row banner">
				
						<div class="col-md-4">
						
								<div class="list-group">
										<div class="list-group-item">
												<div class="row-action-primary">
														<i class="fas fa-user fa-2x"></i>
												</div>
												<div class="row-content">
														<div class="action-secondary"><i class="mdi-social-info"></i></div>
														<h4 class="list-group-item-heading">Manage User</h4>
																<a href="/admin/users" class="btn btn-default btn-raised">All users</a>
														</div>
												</div>
												<div class="list-group-separator"></div>
												<div class="list-group-item">
														<div class="row-action-primary">
																<i class="fas fa-users fa-2x"></i>
														</div>
														<div class="row-content">
																<div class="action-secondary"<i class="mdi-material-info"></i></div>
																<h4 class="list-group-item-heading">Manage Roles</h4>
																<a href="/admin/roles" class="btn btn-default btn-raised">All Roles</a>
																<a href="/admin/roles/create" class="btn btn-primary btn-raiser">Create a Role</a>
																</div>
														</div>
														<div class="list-group-separator"></div>
														<div class="list-group-item">
																<div class="row-action-primary">
																		<i class="fas fa-edit fa-2x"></i>
																</div>
																<div class="row-content">
																		<div class="action-secondary"></div>
																		<h4 class="list-group-item-heading">Manage posts</h4>
																		<a href="/admin/posts" class="btn btn-default btn-raised">All posts</a>
																		<a href="/admin/posts/create" class="btn btn-primary btn-raised">Create a post</a>
																		</div>
																</div>
																<div class="list-group-separator"></div>
																
																<div class="list-group-item">
																		<div class="row-action-primary">
																				<i class="fas fa-folder-open fa-2x"></i>
																		</div>
																		<div class="row-content">
																				<div class="action-secondary"><i class="mdi-material-info"></i></div>
																				<h4 class="list-group-item-heading">Manage categories</h4>
																				<a href="/admin/categories" class="btn btn-default btn-raised">All Categories</a>
																				<a href="/admin/categories/create" class="btn btn-primary btn-raised">New Category</a>
																		</div>
																</div>
																			
														</div>		
												</div>
												
												<div class="col-md-4">
												  <div class="list-group">
														  <div class="list-group-item">
												  				<i class="fas fa-archive fa-2x"></i>
														  		<div class="row-content">
														  				<h4 class="list-group-item-heading">Manage Products</h4>
														  				<a href="admin/products" class="btn btn-default btn-raised">All products</a>
														  				<a href="admin/products/create" class="btn btn-primary btn-raised">Create product</a>
														  		</div>
														  </div>
														  <div class="list-group-item">
												  				<i class="fas fa-folder-open fa-2x"></i>
														  		<div class="row-content">
														  				<h4 class="list-group-item-heading">Manage Categories</h4>
														  				<a href="admin/products/categories" class="btn btn-default btn-raised">All Categories</a>
														  				<a href="admin/products/categories/create" class="btn btn-primary btn-raised">Create Category</a>
														  		</div>
														  </div>				
												  </div>
												</div>																					
@endsection