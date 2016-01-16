@extends('Weabo.template.weabo_template')

@section('content')


<div class="content-list">
	<div class="option-alpha">
		<div class="btn-group" style="text-align:left;" role="group" aria-label="...">
		
			<button type="button" onclick="location.href='{{ url('anime/list') }}/number'" class="btn btn-warning">#</button>
			<?php
				  foreach (range('A', 'Z') as $column)
				  {
			         echo "<button type=\"button\" onclick=\"location.href='" . url('anime/list') . "/$column'\" class=\"btn btn-warning\">$column</button></a>";
			      }    
			?>
			<br>
		</div>
	</div>
	<div class="result-select">
		<ul>
			@foreach($animes as $anime)
			<li>
				<a href="">
				    <article class="general-card">
						<div class="general-header">
							<img src="{{ $anime->cover }}" class="img-header lazyOwl" alt="">
						</div>
						<div class="general-content">
							<div class="general-title">
								{{ $anime->title }}
							</div>
						</div>
							<div class="general-bottom">
								<button class="ripple-button ripple" onclick="location.href='{{url('anime')}}/{{$anime->id}}';" data-ripple-color="#ffca28" style="background:white; color: #ff5722; font-size:13px;">READ MORE</button>		
							</div>
					</article>
				</a>
			</li>
			@endforeach
		</ul>
		{!! $animes->links() !!}
	</div>

</div>




@stop