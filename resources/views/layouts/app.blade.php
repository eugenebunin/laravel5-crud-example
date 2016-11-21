<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="CoSign">
    <meta name="description" content="CoSign">
    <meta name="robots" content="index, follow">

    <title>CRUD Example</title>

    <link href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"
					  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
					  crossorigin="anonymous"></script>
		<script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/js/angular.min.js') }}"></script>
		<script src="{{ asset('/js/angular-sanitize.min.js') }}"></script>
		<script src="{{ asset('/js/application.js') }}"></script>
		<script src="{{ asset('/js/controllers/PageController.js') }}"></script>
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
</head>
<body>

@yield('content')

</body>
</html>
