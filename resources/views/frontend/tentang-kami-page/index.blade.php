@extends('frontend._layouts.basic')

@section('title')
	<title>Panca Logam | Tentang Kami</title>
@endsection

@section('meta')
@endsection

@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/kontak-footer.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/form-style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/tentang-kami.css') }}">
@endsection

@section('body')
	<div id="header" style="background-image: url('{{ asset('amadeo/images-base/tentang-kami-header.jpg') }}');">
		<div id="wrapper">
			<img src="{{ asset('amadeo/images-base/tentang-kami-bg-atas.png') }}">
		</div>
	</div>

	<div id="tentang-kami">
		<div id="wrapper">
			<div id="title">
				<h1>TENTANG</h1>
				<h1>KAMI</h1>
			</div>
			<div id="content">
				<div class="bar">
					<p>
						PT. Panca Logam Suskses Mandiri telah berkomitment dalam pemasaran besi dan baja, baik grosir maupun retail dipergunakan untuk bahan industri dan konstruksi. Kantor kami terletak di jantung kota Jakarta, Ibukota Indonesia, dimana sangat nyaman dan memmudahkan para pelanggan yang datang dari berbagai daerah. Harga yang kompetitif dan berkualitas menjadi dua prioritas utama bisnis kami, bersama dengan inovasi yang berkelanjutan dan didukung dengan staf yang handal,kami berharap dapat membantu para pelanggan untuk menemukan produk yang paling efektif, efisien dan sesuai dengan kebutuhan anda.
					</p>					
				</div>
				<div class="bar">
					<p>
						PT. Panca Logam Sukses Mandiri telah membangun jaringan yang baik dan hubungan dengan banyak pemasok impor maupun lokal. Pengalaman, jaringan dan reputasi besar telah membawa kita untuk menjadi distributor yang dapat eksis di pasar baja nasional. Komitmen yang tinggi terhadap pelanggan dan memberikan pelayanan yang terbaik diharapkan dapat memberikan kepuasan untuk para pelanggan kami.
					</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<div id="visi-misi">
		<div id="wrapper">
			<div id="img" class="bar" style="background-image: url('{{ asset('amadeo/images-base/tentang-kami-visi-mis.jpg') }}');"></div>
			<div class="bar">
				<div id="visi">
					<h1>VISI</h1>
					<p>
						Kami adalah menjadi distributor besi dan baja terbesar di Indonesia, untuk menyediakan dan memenuhi kebutuhan pelanggan dengan semua jenis profil kebutuhan industri dan konstruksi.
					</p>
				</div>
				<div id="misi">
					<div id="wrapper">
						<h1>MISI</h1>
						<p>
							Kami selalu berinovasi untuk melengkapi semua kebutuhan pelanggan, peningkatan layanan dan terus melatih tim kami sehingga mereka memiliki pengetahuan yang lebih baik tentang produk dan layanan menyeluruh, yang akhirnya dapat memberikan pengalaman kenyamanan berbelanja bagi pelanggan kami.
						</p>
					</div>
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
