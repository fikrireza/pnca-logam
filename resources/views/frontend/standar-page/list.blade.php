@foreach($layanan as $list)
	<div class="bar" style="background-image: url('{!! asset('amadeo/images/'.$list->img_url) !!}');">
		<div id="descript">
			<h2>{{ $list->nama }}</h2>
			{!! Illuminate\Support\Str::words($list->deskripsi, 15, "...</p>") !!}
			<div class="text-center">
				<a class="btn-purple" href="{{ route($routeView, [ 'slug' => $list->slug ]) }}">
					LEBIH DETAIL
				</a>
			</div>
		</div>
	</div>
@endforeach