<!DOCTYPE html>
<html>
<!-- Leaving commented out code from the template of the foobooks example as reminders to myself about how the template can be used. -->
<head>
	<title>
        @yield('title', 'CheckSplitter')
    </title>

	<meta charset='utf-8'>
    <!--<link href="/css/foobooks.css" type='text/css' rel='stylesheet'>-->

    @stack('head')

</head>
<body>

	<header>
		<!--<img
        src='http://making-the-internet.s3.amazonaws.com/laravel-foobooks-logo@2x.png'
        style='width:300px'
        alt='Foobooks Logo'>-->
	</header>

	<section>
		@yield('content')
	</section>

	<footer class='copyright'>
		&copy; {{ date('Y') }}
	</footer>

	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->

    @stack('body')

</body>
</html>
