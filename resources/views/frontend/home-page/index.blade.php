@extends('frontend._layouts.basic')

@section('title')
	<title>Panca Logam</title>
@endsection

@section('meta')
@endsection

@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/plugin/owl-carousel/owl.carousel.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/plugin/owl-carousel/owl.theme.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/plugin/owl-carousel/owl.transitions.css') }}">
@endsection

@section('body')
	<div id="navigasi">
		<div id="contact">
			<label>
				<img src="{{ asset('amadeo/images-base/phone.png') }}"> 021 5417203	
			</label>
			<label>
				<img src="{{ asset('amadeo/images-base/mail.png') }}"> pancalogam@ymail.com
			</label>
		</div>
		<div id="content">
			<div class="wrapper">
				<div id="logo" class="bar">
					<img src="{{ asset('amadeo/images-base/logo-pancalogam.png') }}">
				</div>
				<div id="name" class="bar">
					<h1>PT. PANCA LOGAM SUKSES MANDIRI</h1>
				</div>
			</div>
			<div class="wrapper">
				<div class="bar">
					<a href="">
						BRANDA
					</a>
				</div>
				<div class="bar">
					<a href="">
						TENTANG KAMI
					</a>
				</div>
				<div class="bar">
					<a href="">
						STANDAR
					</a>
				</div>
				<div class="bar">
					<a href="">
						SCRAP
					</a>
				</div>
				<div class="bar">
					<a href="">
						KONTAK
					</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

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
				<form>
					<input 
						type="text" 
						name="name"
						placeholder="Name" 
					>
					<input 
						type="email" 
						name="email"
						placeholder="Email" 
					>
					<input 
						type="text" 
						name="phone"
						placeholder="Phone" 
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
			<div id="href">
				<a href="" class="btn-purple">LIHAT</a>
			</div>
		</div>
		<div class="img" style="background-image: url('{{ asset('amadeo/images-base/produk-img-2.jpg') }}');"></div>
	</div>

	<div id="servis">
		
	</div>
@endsection

@section('script')
	<script type="text/javascript" src="{{ asset('amadeo/plugin/owl-carousel/owl.carousel.min.js') }}"></script>
	<script type="text/javascript">
		$("#sliders").owlCarousel({
			navigation : false,
			items: 1,
			singleItem:true,
			pagination:false,
			autoPlay: 3000,
		    stopOnHover:false
		});
	</script>
@endsection
