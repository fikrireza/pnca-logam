@for($a=0; $a<=$manyItems; $a++)
		<div class="bar">
			<div id="img" style="background-image: url('{!! asset('amadeo/images/standar/'.$items[$a].'.png') !!}');">
				<div id="descript">
					<h2>{{ $items[$a] }}</h2>
					<p>
						Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
					</p>
					<div class="text-center">
						<a class="btn-purple" @if(!Route::is('frontend.scrap.produk*')) href="{{ route($routeView, [ 'slug' => str_slug($items[$a], '-') ]) }}" @endif>
							LEBIH DETAIL
						</a>
					</div>
				</div>
			</div>
		</div>
@endfor