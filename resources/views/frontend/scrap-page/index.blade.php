@extends('frontend._layouts.basic')

@section('title')
	<title>Panca Logam | Scrap</title>
@endsection

@section('meta')
@endsection

@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/kontak-footer.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/form-style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/scrap-index.css') }}">
@endsection

@section('body')
	<div id="banner" style="background-image: url('{{ asset('amadeo/images-base/tentang-kami-header.jpg') }}');"></div>

	<div id="servis">
		<div id="content" class="bar">
			<img id="top" class="teksture" src="{{ asset('amadeo/images-base/tekstur-red.png') }}">
			<img id="bottom" class="teksture" src="{{ asset('amadeo/images-base/tekstur-red.png') }}">
			<div id="wrapper">
				<h1>SERVIS</h1>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</p>
				<div class="text-center">
					<a class="btn-purple" href="{{ route('frontend.scrap.servis') }}">SEMUA SERVIS</a>
				</div>
			</div>
		</div>
		<div id="img" class="bar">
			<div id="img" style="background-image: url('{{ asset('amadeo/images-base/servis.jpg') }}');"></div>
		</div>
		<div class="clearfix"></div>
	</div>

	<div id="produk">
		<div id="img" class="bar" style="background-image: url('{{ asset('amadeo/images-base/pipa.jpg') }}');">
			<div id="titile">
				<h1>SCRAP</h1>
				<h1>PRODUK</h1>
			</div>
		</div>
		<div id="content" class="bar">
			<div id="descrip">
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</p>
			</div>
			<div class="text-center">
				<a class="btn-purple" href="{{ route('frontend.scrap.produk') }}">SEMUA PRODUK</a>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>

	<div id="projek">
		<div id="wrapper">
			<div id="title">
				<h1><big>PROJEK</big></h1>
				<div id="border-top"></div>
				<div id="border-left"></div>
			</div>

			@foreach($proyek as $list)
			<div class="bar">
				<a href="{{ route('frontend.scrap.projek.view', ['slug'=>$list->slug]) }}">
					<div id="content">
						<div id="img" style="background-image: url('{{ asset('amadeo/images/'.$list->img_url) }}');"></div>
						<div id="descrip">
							<h3>{{$list->nama}}</h3>
							{!! Illuminate\Support\Str::words($list->deskripsi, 15, "...</p>") !!}
						</div>
					</div>
				</a>
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>
	</div>

	@include('frontend._include.kontak-footer')
@endsection

@section('script')
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript" src="{{ asset('amadeo/js/func-input-only-number.js') }}"></script>
@endsection
