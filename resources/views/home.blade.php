@extends('welcome')

@section('navmenu')
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ url('/') }}">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('/create') }}">Create token</a></li>
      <li><a href="{{ url('/blog') }}">Blog</a></li>
      <li><a href="{{ url('/tickets') }}">Tickets</a></li>
      <li><a href="{{ url('/about') }}">About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
 					@guest  
      <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      @else
      <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                				@if(Auth::user()->hasRole('manager'))
                                    <li>
                                        <a href="/admin">Admin</a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>                        

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>           
                                </ul>
                            </li>
                        @endguest
    </ul>
  </div>
	</nav>
	@show()

@section('content')
	
@endsection
