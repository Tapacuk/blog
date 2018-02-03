<html>
@section('header')
<head>
   <title>Home Page</title>
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

   <!-- Latest compiled and minified JavaScript -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
@show()

<body style="background-image: url('https://cdn-images-1.medium.com/max/1200/1*aCCH418GrsTqzVdEONe33g.png');">
		@section('navmenu')
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ url('/') }}">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ url('/') }}">Home</a></li>
      <li><a href="{{ url('/create') }}">Create token</a></li>
      <li><a href="{{ url('/tickets') }}">Tickets</a></li>
      <li><a href="{{ url('/about') }}">About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-user"></span> Login</a></li>
    </ul>
  </div>
	</nav>
	@show()
	
	@section('content')
	
	@show()

</body>
</html>