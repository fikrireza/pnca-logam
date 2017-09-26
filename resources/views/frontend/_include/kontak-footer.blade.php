	<div id="kontak">
		<div id="wrapper">
			<div id="title">
				<h1>KONTAK</h1>
				<h1><big>INFO</big></h1>
				<div id="border-top"></div>
				<div id="border-left"></div>
			</div>
			<div class="bar">
				<div class="rows">
					<div class="cell">
						<img src="{{ asset('amadeo/images-base/phone.png') }}" width="30px">
					</div>
					<div class="cell">
						<p>021 6192424</p>
						<p>021 5417203</p>
					</div>
				</div>
				<div class="rows">
					<div class="cell">
						<img src="{{ asset('amadeo/images-base/mail.png') }}"  width="30px">
					</div>
					<div class="cell">
						<p>pancalogam@ymail.com</p>
					</div>
				</div>
				<div class="rows">
					<div class="cell">
						<img src="{{ asset('amadeo/images-base/location.png') }}"  width="20px">
					</div>
					<div class="cell">
						<p>Jln. Kapuk Raya No 88, Samping Ruko Grisenda Jakarta Utara</p>
					</div>
				</div>
				<div id="temukan-kami">
					<h3>TEMUKAN KAMI</h3>
					<img src="{{ asset('amadeo/images-base/logo-fb.png') }}">
					<img src="{{ asset('amadeo/images-base/logo-ig.png') }}">
					<img src="{{ asset('amadeo/images-base/logo-youtube.png') }}">
				</div>
			</div>
			<div class="bar">
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
					@if($errors->has('email'))
						<span>{{ $errors->first('email')}}</span>
					@endif
					<input 
						type="text" 
						name="email"
						placeholder="Email" 
						value="{{ old('email') }}"
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
					@if($errors->has('subject'))
						<span>{{ $errors->first('subject')}}</span>
					@endif
					<input 
						type="text" 
						name="subject"
						placeholder="Subject" 
						value="{{ old('subject') }}"
					>
					@if($errors->has('pesan'))
						<span>{{ $errors->first('pesan')}}</span>
					@endif
					<textarea 
						name="pesan" 
						placeholder="Pesan"
						rows="4" 
					>{{ old('pesan') }}</textarea>
					<div class="submit-wrapper">
						@if($errors->has('g-recaptcha-response'))
							<span>{{ $errors->first('g-recaptcha-response')}}</span>
						@endif
						<div class="g-recaptcha" data-sitekey="6LcoAS4UAAAAAHQ-NpZB7oZIeQ_IH-BUL6NuZqpw" data-callback="submitThisForm"></div>
						<button id="submit" class="btn-purple" type="submit">SUBMIT</button>
					</div>
				</form>
			</div>
			<div class="bar">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4717.572698065439!2d106.74522609902688!3d-6.1320490612057785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1d675d022517%3A0x9b72294fd22981ec!2sPanca+Logam!5e0!3m2!1sid!2sid!4v1506303720461" frameborder="0" style="border:0" allowfullscreen></iframe>
				<div class="text-center">
					<a href="https://www.google.co.id/maps/place/Panca+Logam/@-6.1320491,106.7452261,16.75z/data=!4m5!3m4!1s0x2e6a1d675d022517:0x9b72294fd22981ec!8m2!3d-6.131834!4d106.747632" class="btn-purple">PETUNJUK ARAH</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>