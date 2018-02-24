@extends('home')

@section('content')
<div class="container" style="margin-top:100px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>{{ empty($user->password) ? "Set the password" : "Change password" }}</h4></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST">
                    @foreach($errors->all() as $error)
																						<p class="alert alert-danger">{{ $error }}</p>
																				@endforeach
																				
																				@if(session('status'))
																						<div class="alert alert-success">
																								{{ session('status') }}
																						</div>
																				@endif
																				
                        {{ csrf_field() }}
																								
																								@if(!is_null($user->password))
																								<div class="form-group{{ $errors->has('cur_password') ? ' has-error' : '' }}">
                            <label for="cur_password" class="col-md-4 control-label">Current Password</label>

                            <div class="col-md-6">
                                <input id="cur_password" type="password" class="form-control" name="cur_password" required>

                                @if ($errors->has('cur_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cur_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endif
																								
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection