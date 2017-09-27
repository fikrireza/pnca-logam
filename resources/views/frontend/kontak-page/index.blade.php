@extends('frontend._layouts.basic')

@section('title')
	<title>Panca Logam | Kontak</title>
@endsection

@section('meta')
@endsection

@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/kontak.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/form-style.css') }}">
@endsection

@section('body')
	<div id="header">
		<div id="wrapper">
			<div id="content">
				<h1>TEMUKAN</h1>
				<h1>KAMI</h1>
				<p>
					PT. Panca Logam Suskses Mandiri telah berkomitment dalam pemasaran besi dan baja, baik grosir maupun retail dipergunakan untuk bahan industri dan konstruksi. Kantor kami terletak di jantung kota Jakarta, Ibukota Indonesia,
				</p>
			</div>
			<a href="https://www.google.co.id/maps/place/Panca+Logam/@-6.1320491,106.7452261,16.75z/data=!4m5!3m4!1s0x2e6a1d675d022517:0x9b72294fd22981ec!8m2!3d-6.131834!4d106.747632">
				<img src="{{ asset('amadeo/images-base/kontak-maps.png') }}">
			</a>
		</div>
	</div>

	<div id="body">
		<img id="top" class="teksture" src="{{ asset('amadeo/images-base/tekstur.png') }}">
		<div id="to-up">
			<div id="wrapper">
				<div id="kirim-pesan" class="bar">
					<div id="content">
						<h2>Kirim Pesan</h2>
						<form id="form-kontak" class="form-style" method="post" action="{{ route('frontend.kontak.simpan') }}" data-test="help me plese">
							@if(Session::has('alert'))
								<script>
								  window.setTimeout(function() {
								    $("#alret-form-kontak").fadeTo(700, 0).slideUp(700, function(){
								        $(this).remove();
								    });
								  }, 5000);
								</script>
						        <div id="alret-form-kontak" class="alert {{ Session::get('alert') }}">
						        	<strong>{{ Session::get('info') }}</strong>
						        </div>
							@endif
					        {{ csrf_field() }}
					        <div class="float margin">
						        @if($errors->has('name'))
									<span>{{ $errors->first('name')}}</span>
								@endif
								<input 
									type="text" 
									name="name"
									placeholder="Name"
									value="{{ old('name') }}"
									{{ Session::has('autofocus') ? 'autofocus' : ''}}
								>
					        	
					        	@if($errors->has('telpon'))
									<span>{{ $errors->first('telpon')}}</span>
								@endif
					        	<input 
									type="text" 
									name="telpon"
									placeholder="Telepon"
									onkeypress="return isNumber(event)"
									value="{{ old('telpon') }}"
								>
					        </div>
					        <div class="float">
								@if($errors->has('email'))
									<span>{{ $errors->first('email')}}</span>
								@endif
								<input 
									type="text" 
									name="email"
									placeholder="Email" 
									value="{{ old('email') }}"
								>
								
								@if($errors->has('subject'))
									<span>{{ $errors->first('subject')}}</span>
								@endif
								<input 
									type="text" 
									name="subject"
									placeholder="Subject" 
									value="{{ old('subject') }}"
								>
					        </div>
							<div class="clearfix"></div>
							@if($errors->has('pesan'))
								<span>{{ $errors->first('pesan')}}</span>
							@endif
							<textarea 
								name="pesan" 
								placeholder="Pesan"
								rows="2" 
							>{{ old('pesan') }}</textarea>
							<div class="submit-wrapper">
								@if($errors->has('g-recaptcha-response'))
									<span>{{ $errors->first('g-recaptcha-response')}}</span>
								@endif
								<div class="g-recaptcha" data-sitekey="6LcoAS4UAAAAAHQ-NpZB7oZIeQ_IH-BUL6NuZqpw" data-callback="submitThisForm"></div>
								<button id="submit" class="btn-purple" type="submit">SUBMIT</button>
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
				<div id="kontak-informasi" class="bar">
					<div id="content">
						<h2>Kontak Informasi</h2>
						<div class="rows">
							<div class="cell">
								<img src="{{ asset('amadeo/images-base/phone.png') }}" width="15px">
							</div>
							<div class="cell">
								<p>021 6192424</p>
								<p>021 5417203</p>
							</div>
						</div>
						<div class="rows">
							<div class="cell">
								<img src="{{ asset('amadeo/images-base/mail.png') }}"  width="15px">
							</div>
							<div class="cell">
								<p>pancalogam@ymail.com</p>
							</div>
						</div>
						<div class="rows">
							<div class="cell">
								<img src="{{ asset('amadeo/images-base/location.png') }}"  width="10px">
							</div>
							<div class="cell">
								<p>Jln. Kapuk Raya No 88, Samping Ruko Grisenda Jakarta Utara</p>
							</div>
						</div>
						<div id="temukan-kami">
							<img src="{{ asset('amadeo/images-base/logo-fb.png') }}">
							<img src="{{ asset('amadeo/images-base/logo-ig.png') }}">
							<img src="{{ asset('amadeo/images-base/logo-youtube.png') }}">
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<img id="bottom" class="teksture" src="{{ asset('amadeo/images-base/tekstur.png') }}">
	</div>
@endsection

@section('script')
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript" src="{{ asset('amadeo/js/func-input-only-number.js') }}"></script>
@endsection
