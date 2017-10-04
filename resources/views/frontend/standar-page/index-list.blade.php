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
					@include('frontend.standar-page.list')

					<div id="appentList"></div>
					<div class="clearfix"></div>
				</div>

				<div id="wrapper-load" class="text-center">
					<div class="ajax-load text-center" style="display:none;">
						<p>
							<img src="http://demo.itsolutionstuff.com/plugin/loader.gif"> Memuat Tampilan
						</p>
					</div>
					<a id="load" class="btn-purple">
						Tampilkan Selebihnya
					</a>
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
@endsection
