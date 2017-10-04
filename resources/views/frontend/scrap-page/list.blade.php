@foreach($layanan as $list)
		<div class="bar">
			<div id="img" style="background-image: url('{!! asset('amadeo/images/'.$list->img_url) !!}');">
				<div id="descript">
					<h2>{{ $list->nama }}</h2>
					{!! Illuminate\Support\Str::words($list->deskripsi, 15, "...</p>") !!}
					<div class="text-center">
						<a class="btn-purple" @if(!Route::is('frontend.scrap.produk*')) href="{{ route($routeView, [ 'slug' => $list->slug ]) }}" @endif>
							LEBIH DETAIL
						</a>
					</div>
				</div>
			</div>
		</div>
@endforeach
