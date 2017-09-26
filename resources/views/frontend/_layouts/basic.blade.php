<!DOCTYPE html>
<html>
<head>

@yield('title')

	<meta charset="utf-8">
	<meta http-equiv="Content-Language" content="{{ App::getLocale() }}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

@yield('meta')

	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/font/font-family.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/public.css') }}">
@yield('style')

</head>
<body>

	@include('frontend._include.navigasi')
@yield('body')
	@include('frontend._include.copy-right')

	<script type="text/javascript" src="{{ asset('amadeo/plugin/jquery/jquery-3.2.0.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('amadeo/js/public.js') }}"></script>
@yield('script')
</body>
</html>