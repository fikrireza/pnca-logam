@extends('frontend._layouts.basic')

@section('title')
	<title>Panca Logam</title>
@endsection

@section('meta')
@endsection

@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/kontak-footer.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/form-style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/plugin/owl-carousel/owl.carousel.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/plugin/owl-carousel/owl.theme.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/plugin/owl-carousel/owl.transitions.css') }}">
@endsection

@section('body')
	<div id="header">
		<div id="sliders">
			@for($a=0; $a<=2; $a++)
			<div class="item" style="background-image: url('{{ asset('amadeo/images-base/slide-one.jpg') }}');">
				<div class="title">
					<h1>TERPERCAYA, BERKUALITAS</h1>
					<h1>HARGA BERSAING</h1>
				</div>
			</div>
			@endfor
		</div>
		<div id="psp">
			<div id="content">
				<p>Dapatkan <b>Produk Standar</b> Untuk <b>Proyek</b> Anda</p>
				<form id="form-produk"  class="form-style" method="post" action="{{ route('frontend.permintaan.list.produk') }}">
			        {{ csrf_field() }}
					@if(Session::has('alert_plp'))
						<script>
						  window.setTimeout(function() {
						    $("#alret-form-produk").fadeTo(700, 0).slideUp(700, function(){
						        $(this).remove();
						    });
						  }, 5000);
						</script>
				        <div id="alret-form-produk" class="alert {{ Session::get('alert_plp') }}">
				        	<strong>{{ Session::get('info_plp') }}</strong>
				        </div>
					@endif
					@if($errors->has('name_plp'))
						<span>{{ $errors->first('name_plp')}}</span>
					@endif
					<input 
						type="text" 
						name="name_plp"
						placeholder="Name"
						value="{{ old('name_plp') }}"
						{{ Session::has('autofocus_plp') ? 'autofocus' : ''}}
					>
					@if($errors->has('email_plp'))
						<span>{{ $errors->first('email_plp')}}</span>
					@endif
					<input 
						type="email" 
						name="email_plp"
						placeholder="Email" 
						value="{{ old('email_plp') }}"
					>
					@if($errors->has('phone_plp'))
						<span>{{ $errors->first('phone_plp')}}</span>
					@endif
					<input 
						type="text" 
						name="phone_plp"
						placeholder="Phone" 
						value="{{ old('phone_plp') }}"
						onkeypress="return isNumber(event)"
					>
					<div style="text-align: center;">
						<button class="btn-purple" type="submit">SUBMIT</button>
					</div>
				</form>
			</div>
			<img id="bg" src="{{ asset('amadeo/images-base/bg-atas.png') }}">
		</div>
	</div>
	<div id="tentang-kami">
		<div id="set-up">
			<div class="wrapper">
				<img src="{{ asset('amadeo/images-base/orang.png') }}">
			</div>
			<div class="wrapper">
				<div id="title">
					<h2>TENTANG</h2>
					<h2>KAMI</h2>
				</div>
				<p>
					PT. Panca Logam Suskses Mandiri telah berkomitment dalam pemasaran besi dan baja, baik grosir maupun retail dipergunakan untuk bahan industri dan konstruksi. Kantor kami terletak di jantung kota Jakarta, Ibukota Indonesia, dimana sangat nyaman dan memmudahkan para pelanggan yang datang dari berbagai daerah.
				</p>
				<p>
					Harga yang kompetitif dan berkualitas menjadi dua prioritas utama bisnis kami, bersama dengan inovasi yang berkelanjutan dan didukung dengan staf yang handal.
				</p>
				<div id="href">
					<a href="" class="btn-purple">DETAIL</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div id="produk">
		<div class="img" style="background-image: url('{{ asset('amadeo/images-base/produk-img-1.jpg') }}');"></div>
		<div id="description" style="background-image: url('{{ asset('amadeo/images-base/produk-img-3.jpg') }}');">
			<div id="title">
				<h2>PRODUK</h2>
				<h2>STANDAR</h2>
			</div>
			<p>
				Produk standar merupakan produk besi baru yang memenuhi standar international. produk ini banyak digunakan dalam proyek proyek besar. seperti pembuatan pabrik, jalan raya, jembatan dan sarana umum lainya. Untuk tau lebih dalam dan melihat jenis besi apa saja yang kami miliki  silahkan klik tombol dibawah ini
			</p>
			<div class="text-center">
				<a href="" class="btn-purple">LIHAT</a>
			</div>
		</div>
		<div class="img" style="background-image: url('{{ asset('amadeo/images-base/produk-img-2.jpg') }}');"></div>
	</div>

	<div id="servis" style="background-image: url('{{ asset('amadeo/images-base/servis-bg.jpg') }}');">
		<div id="wrapper">
			<div id="title">
				<h2>SERVIS KAMI</h2>
				<p>
					Untuk menunjang kelengkapan dan pelayanan perusahaan kami, kami menyediakan jasa transportasi
				</p>
			</div>
			<div id="sliders">
				@for($a=0; $a<=2; $a++)
				<div class="item">
					<div class="wrapper">
						<div class="to-center">
							<div class="border">
								<div class="img" style="background-image: url('{{ asset('amadeo/images-base/transport.jpg') }}');"></div>
							</div>
						</div>
						<h4>Layanan Antar</h4>
						<p>kami menyediakan pelayanan armada</p>
						<p>angkut untuk pengiriman produk penjualan</p>
					</div>
				</div>
				@endfor
			</div>
		</div>
	</div>

	<div id="klien">
		<div id="wrapper">
			<h2>KLIEN KAMI</h2>
			<div id="sliders">
				@for($a=1; $a<=4; $a++)
				<div class="item">
					<img class="img" src="{{ asset('amadeo/images-base/logo-klien-'.$a.'.png') }}">
				</div>
				@endfor
			</div>
		</div>
	</div>

	@include('frontend._include.kontak-footer')
@endsection

@section('script')
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript" src="{{ asset('amadeo/plugin/owl-carousel/owl.carousel.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('amadeo/js/func-input-only-number.js') }}"></script>
	<script type="text/javascript" src="{{ asset('amadeo/js/home.js') }}"></script>
@endsection
