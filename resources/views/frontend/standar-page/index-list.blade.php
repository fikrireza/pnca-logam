@extends('frontend._layouts.basic')

@section('title')
	<title>Panca Logam | Standar {!! $titlePage !!}</title>
@endsection

@section('meta')
@endsection

@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/kontak-footer.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/form-style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/standar-list.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/plugin/owl-carousel/owl.carousel.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/plugin/owl-carousel/owl.theme.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/plugin/owl-carousel/owl.transitions.css') }}">
@endsection

@section('body')
	<div id="banner" style="background-image: url('{{ asset('amadeo/images-base/tentang-kami-header.jpg') }}');"></div>

	<div id="list-standar">
		<img id="top" class="teksture" src="{{ asset('amadeo/images-base/tekstur.png') }}">
		<div id="wrapper">

			<h1>{!! $titlePage !!}</h1>
			<h1><b>STANDAR</b></h1>

			<div id="list">
				<div class="item">
					
					@for($a=0; $a<=$manyItems; $a++)

					<div class="bar" style="background-image: url('{!! asset('amadeo/images/standar/'.$items[$a].'.png') !!}');">
						<div id="descript">
							<h2>{{ $items[$a] }}</h2>
							<p>
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
							</p>
							<div class="text-center">
								<a class="btn-purple" href="{{ route($routeView, [ 'slug' => str_slug($items[$a], '-') ]) }}">
									LEBIH DITAIL
								</a>
							</div>
						</div>
					</div>

					<?php // jika pada urutan akhir dan tidak di akhir produk maka tutup dan buka ?>
					@if( ($a+1) % 9 == 0 and $a != $manyItems) 
					<div class="clearfix"></div>
				</div>
				<div class="item">
					@endif
					<?php // jika pada urutan akhir dan tidak di akhir produk maka tutup dan buka ?>

					@endfor
					<div class="clearfix"></div>
				</div>
			</div>

		</div>
		<img id="bottom" class="teksture" src="{{ asset('amadeo/images-base/tekstur.png') }}">
	</div>

	@include('frontend._include.kontak-footer')
@endsection

@section('script')
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript" src="{{ asset('amadeo/js/func-input-only-number.js') }}"></script>
	<script type="text/javascript" src="{{ asset('amadeo/plugin/owl-carousel/owl.carousel.min.js') }}"></script>

	<script type="text/javascript">
		$("#list").owlCarousel({
			navigation : true,
			items: 1,
			singleItem:true,
			pagination:false,
			autoPlay: false,
		    navigationText : ["<img src='{{ asset('amadeo/images-base/panah.png') }}'>","<img src='{{ asset('amadeo/images-base/panah.png') }}'>"]
		});
	</script>
@endsection
