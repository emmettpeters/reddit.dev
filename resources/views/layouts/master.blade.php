<!DOCTYPE html>
<html>
<head>
	@yield('title')

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--  <link rel="stylesheet" type="text/css" src="/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">


</head>
<body>
	<nav></nav>

	@yield('content')

	<footer></footer>

	<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://static.filestackapi.com/v3/filestack.js"></script>
</body>
</html>