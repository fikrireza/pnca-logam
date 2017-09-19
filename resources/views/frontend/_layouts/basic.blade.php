<!DOCTYPE html>
<html>
<head>

@yield('title')

	<meta charset="utf-8">
	<meta http-equiv="Content-Language" content="{{ App::getLocale() }}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
@yield('meta')
@yield('style')

</head>
<body>
@yield('body')
	<script type="text/javascript" src="{{ asset('amadeo/plugin/jquery/jquery-3.2.0.min.js') }}"></script>
@yield('script')
</body>
</html>