@extends('frontend._layouts.basic')

@section('title')
	<title>Panca Logam | Scrap {!! $titlePage !!}</title>
@endsection

@section('meta')
@endsection

@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/kontak-footer.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/form-style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/scrap-list.css') }}">

	@if(Route::is('frontend.scrap.produk*'))
		<style type="text/css">
			#view{
				position: fixed;
				top: 12.5vh;
				width: 90%;
				height: 75vh;
				margin: 0 auto;
			    padding-bottom: 20px;
				left: 5%;
				right: 5%;
				background-position: center;
				background-size: cover;
				background-repeat: no-repeat;
				z-index: 20;
				transform: translateX(-100vw);
				transition: all 1.51s;
			}
			#view.aktif{
				transform: translateX(0);	
			}
			#view img#icon-close{
				position: absolute;
				right: -20px;
				top: -20px;
				cursor: pointer;
			}
			#view #wrapper{
				position: relative;
				margin: 5% auto;
				width: 90%;
				height: 80%;
				overflow-y: auto;
			}
			#view #wrapper .bar{
				position: relative;
				float: left;
				width: 50%;
			}
			#view #wrapper .bar #padding{
				position: relative;
				padding: 0px 10px;
			}
			#view #wrapper .bar #padding .items{
				float: left;
				width: 50%;
			}
			#view #wrapper .bar #padding .items #box{
				position: relative;
				padding: 0px 5px 10px;
			}
			#view #wrapper .bar #padding .items #box #img{
				background-position: center;
				background-size: cover;
				background-repeat: no-repeat;
				width: 100%;
				height: 30vh;
				position: relative;
			}
			#view #wrapper .bar #padding .items #box #img h5{
				position: absolute;
				bottom: 0;
				left: 12.5%;
				right: 12.5%;
				margin: 0 auto;
				margin-bottom: 20px;
				width: 65%;
				color: white;
				text-align: center;
				text-transform: uppercase;
		        font-family: 'roboto black';
		        font-size: 20px;
			}
			#view #wrapper .bar #padding .items #box #content{
				border: .5px solid rgb(202,202,202);
			}
			#view #wrapper .bar #padding .items #box #content p{
				width: 90%;
				margin: 5px auto;
				color: rgb(115,116,116);
				text-align: center;
				font-family: 'kanit';
		        font-weight: lighter;
		        font-size: 12px;
			}
			#view #wrapper .bar #padding h2{
				margin: 0;
		        font-family: 'roboto black';
		        font-size: 26px;
		        text-transform: uppercase;
			}
			#view #wrapper .bar #padding ol{
				margin: 10px auto;
			}
			#view #wrapper .bar #padding ol li{
				margin-bottom: 10px;
			}
			#view #wrapper .bar #padding h5,
			#view #wrapper .bar #padding ol li h5{
				margin: 0;
				margin-bottom: 5px;
				font-family: 'kanit';
		        font-size: 18px;
			}
			#view #wrapper .bar #padding p,
			#view #wrapper .bar #padding ol li p,
			#view #wrapper .bar #padding ul li p{
				margin: 0;
				font-family: 'kanit';
		        font-weight: lighter;
		        font-size: 14px;
			}
			/* mobile */
				@media (max-width: 480px) {
					#view #wrapper .bar,
					#view #wrapper .bar #padding .items{
						width: 100%;
					}
				}
			/* mobile */
		</style>
	@endif
@endsection

@section('body')
	<div id="banner" style="background-image: url('{{ asset('amadeo/images-base/tentang-kami-header.jpg') }}');"></div>

	<div id="list-scrap">
		<img id="top" class="teksture" src="{{ asset('amadeo/images-base/tekstur-red.png') }}">
		<img id="bottom" class="teksture" src="{{ asset('amadeo/images-base/tekstur-red.png') }}">
		<div id="wrapper">

			{!! $titlePageBody !!}
			
			<div id="list">
				<div class="item">
					@include('frontend.scrap-page.list')
					<div id="appentList"></div>
				</div>

				<div class="clearfix"></div>

				@if(!Route::is('frontend.scrap.produk*'))
				<div id="wrapper-load" class="text-center">
					<div class="ajax-load text-center" style="display:none;">
						<p>
							<img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post
						</p>
					</div>
					<a id="load" class="btn-purple">
						Tampilkan Selebihnya
					</a>
				</div>
				@endif
			</div>

		</div>
	</div>

	@if(Route::is('frontend.scrap.produk*'))
		<div id="view" style="background-image: url('{{ asset('amadeo/images-base/servis-bg.jpg') }}');">
			<img id="icon-close" src="{{ asset('amadeo/images-base/icon-close.png') }}">
			<div id="wrapper">
				<div class="bar">
					<div id="padding">
						@foreach($layanan as $list)
						<div class="items">
							<div id="box">
								<div id="img" style="background-image: url('{{ asset('amadeo/images/'.$list->img_url) }}');">
									<h5>{{$list->nama}}</h5>
								</div>
								<div id="content">
									{!! $list->deskripsi !!}
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				<div class="bar">
					<div id="padding">
						<h2>KLASIFIKASI</h2>
						<h2>BESI BEKAS</h2>
						<ol>
						@for($a=0; $a<=$manyKategori; $a++)
							<li>
								<h5>{{ $kategoriBesiName[$a] }}</h5>
								<p>
									{{ $kategoriBesiDesc[$a] }}
								</p>
							</li>
						@endfor
						</ol>

						<h5>Catatan</h5>
						<p>
							Penilaian dan kategori dari masing-masing pabrik daur ulang atau peleburan yang ada di Indonesia tidak sama, tergantung keperluan dan hasil produksi pabrik daur ulang tersebut.
						</p>
						<ul>
							<li>
								<p>
									Dimensi fisik besi bekas maksimal 1 meter kubik, apabila lebih dari ukuran terkena biaya potong.
								</p>
							</li>
							<li>
								<p>
									Tidak mengandung kotoran lainnya (karet, minyak, plastik, kertas, dan lainnya).
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	@endif

	@include('frontend._include.kontak-footer')
@endsection

@section('script')
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript" src="{{ asset('amadeo/js/func-input-only-number.js') }}"></script>

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

	@if(Route::is('frontend.scrap.produk*'))
		<script type="text/javascript">
			$("#list-scrap #wrapper #list .bar #descript .text-center a").click(function(){
				$('#view').toggleClass("aktif");;
			});
			$("#view img#icon-close").click(function(){
				$('#view').toggleClass("aktif");;
			});
		</script>
	@endif
	@if(!Route::is('frontend.scrap.produk*'))
	<script type="text/javascript">
		var page = 1;
		$("#load").click(function(){
		    page++;
		        loadMoreData(page);
		});

		function loadMoreData(page){
		  $.ajax(
		        {
		            url: '?page=' + page,
		            type: "get",
		            beforeSend: function()
		            {
		                $('.ajax-load').show();
		            }
		        })
		        .done(function(data)
		        {
		            if(!data.html){
		                $('.ajax-load').hide();
			            $('#load').hide();
		                return;
		            }
		            $('.ajax-load').hide();
		            $("#appentList").append(data.html);
		        })
		        .fail(function(jqXHR, ajaxOptions, thrownError)
		        {
		              alert('server not responding...');
		        });
		}
	</script>
	@endif

@endsection
