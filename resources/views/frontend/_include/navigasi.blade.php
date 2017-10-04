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
					<div id="burger">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</div>
				<div id="name" class="bar">
					<h1>PT. PANCA LOGAM SUKSES MANDIRI</h1>
				</div>
			</div>
			<div class="wrapper">
				<div class="bar">
					<a href="{{ route('frontend.home') }}">
						BERANDA
					</a>
				</div>
				<div class="bar">
					<a href="{{ route('frontend.tentang-kami') }}">
						TENTANG KAMI
					</a>
				</div>
				<div class="bar dropdown">
					<a href="{{ route('frontend.standar.index') }}">
						STANDAR
					</a>
					<div id="dropdown-content">
						<div id="padding">
							<div class="list">
								<a href="{{ route('frontend.standar.produk') }}">
									Produk
								</a>	
							</div>
							<div class="list">
								<a href="{{ route('frontend.standar.servis') }}">
									Servis
								</a>	
							</div>
						</div>
					</div>
				</div>
				<div class="bar dropdown">
					<a href="{{ route('frontend.scrap.index') }}">
						SCRAP
					</a>
					<div id="dropdown-content">
						<div id="padding">
							<div class="list">
								<a href="{{ route('frontend.scrap.servis') }}">
									Servis
								</a>	
							</div>
							<div class="list">
								<a href="{{ route('frontend.scrap.produk') }}">
									Produk
								</a>	
							</div>
							<div class="list">
								<a href="{{ route('frontend.scrap.projek') }}">
									Proyek
								</a>	
							</div>
						</div>
					</div>
				</div>
				<div class="bar">
					<a href="{{ route('frontend.kontak') }}">
						KONTAK
					</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>