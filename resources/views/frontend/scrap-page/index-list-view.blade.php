@extends('frontend._layouts.basic')

@section('title')
	<title>Panca Logam | Scrap {!! $titlePage !!} {{ $layanan->nama }}</title>
@endsection

@section('meta')
@endsection

@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/kontak-footer.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/form-style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/scrap-list-view.css') }}">
@endsection

@section('body')
	<div id="banner" style="background-image: url('{{ asset('amadeo/images-base/tentang-kami-header.jpg') }}');"></div>

	<div id="item-content">
		<img id="left" class="teksture" src="{{ asset('amadeo/images-base/tekstur-red.png') }}">
		<img id="right" class="teksture" src="{{ asset('amadeo/images-base/tekstur-red.png') }}">
		<img id="bottom" class="teksture" src="{{ asset('amadeo/images-base/tekstur-red.png') }}">

		<div id="wrapper">
			<div id="img" class="bar" style="background-image: url('{{ asset('amadeo/images/'.$layanan->img_url) }}');"></div>
			<div id="content" class="bar">
				<div class="content">
					<h1>{{ $layanan->nama }}</h1>
					{!! $layanan->deskripsi !!}
					<a href="{{ route($routeList) }}">
						<img src="{{ asset('amadeo/images-base/panah.png') }}">
					</a>
					<a href="{{ route($routeList) }}">
						SEMUA {{$titlePage}}
					</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	@include('frontend._include.kontak-footer')
@endsection

@section('script')
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript" src="{{ asset('amadeo/js/func-input-only-number.js') }}"></script>
@endsection
