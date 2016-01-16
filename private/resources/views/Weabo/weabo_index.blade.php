@extends('Weabo.template.weabo_template')

@section('content')

<div class="on-going" data-toggle="tooltip" data-placement="left" title="Swipe me!">
	<div class="page-header">
	  <h3>  <small><span class="label label-warning">ONGOING</span></small></h3>
	</div>
	<div class="onging-anime">
		@foreach($on_anime as $anime)
		<div class="item">      	
		    <article class="general-card">
				<div class="general-header on-header">
					<img src="{{ $anime->cover }}" class="img-header lazyOwl" alt="">
				</div>
				<div class="general-content">
					<div class="general-title">
						{{ $anime->title }}
					</div>
				</div>
					<div class="general-bottom">
						 <button onclick="location.href='{{url('anime')}}/{{$anime->id}}';" class="ripple-button ripple" data-ripple-color="#ffca28" style="background:white; color: #ff5722; font-size:13px;">READ MORE</button>
					</div>
				
			</article>
      	</div>
      	@endforeach
	</div>
</div>

<div class="release">
	<div class="page-header">
	  <h3><small><span class="label label-warning">NEW RELEASE</span></small></h3>
	</div>
	<div class="item-release">
		<ul>
		@foreach($posts as $post)
		<li id="re-item">
			<a href="{{url('anime/episode')}}/{{str_replace(' ', '_', $post->title)}}">
				<div class="row">
					<div class="list-card col-md-11  padding-top:5px;">
						@if($post->now == 0)
							<span class="label label-warning notif" style="float:right;">NEW</span>
						@endif
						<div class="thumbnails" >
							<img src="{{ $post->screenshot1 }}" width="170" height="100"  class="img-thumb" alt="">
						</div>
						<div class="desc col-md-9">
							<div class="title">
								<h4 style="color:#8a8a8a;">
									<b>
										{{ $post->title }}
									</b>
								</h4>
							</div>
							<div class="details">			
								Posted by <span class="label label-warning">{{ $post->User->name }}</span> 
								&nbsp;&nbsp;<span class="glyphicon glyphicon-calendar"></span>{{ date_format($post->created_at, 'g:ia \o\n l jS F Y') }} 
								<a href="{{ url('anime') }}/{{ $post->id_anime }}" class="more"> <span class="badge">More Episode</span></a>			
							</div>
						</div>		
					</div>
				</div>
			</a>
		</li>
		@endforeach
		</ul>
	</div>
	{!! $posts->links() !!}
</div>	
<div class="category" data-toggle="tooltip" data-placement="left" title="Swipe me!">
	<div class="page-header">
	  <h3>  <small><span class="label label-warning">CATEGORY</span></small></h3>
	</div>
	<div class="category-anime">
		@foreach($category as $cat)
		<div class="item">      	
		    <a href="{{ url('anime/list/category/') }}/{{ $cat->category }}">
		    <article class="category-card">
				<div class="category-header">
					<img src="{{ $cat->cover }}" class="img-category lazyOwl" alt="">
				</div>
				<div class="category-content">
					<div class="category-title">
						{{ $cat->category }}
					</div>
				</div>
			</article>
			</a>
      	</div>
      	@endforeach
	</div>
</div>

<div class="most-watched">
	<div class="page-header">
	  <h3>  <small><span class="label label-warning">MOST WATCHED</span></small></h3>
	</div>
	<ul>
		@foreach($most as $m)
		<li>
			<a href="{{url('anime')}}/{{$m->id_anime}}">
			    <article class="general-card">
					<div class="general-header">
						<img src="{{ $m->cover }}" class="img-header lazyOwl" alt="">
					</div>
					<div class="general-content">
						<div class="general-title">
							{{ $m->title }}
						</div>
					</div>
						<div class="general-bottom">
							<button onclick="location.href='{{url('anime')}}/{{$m->id_anime}}';" class="ripple-button ripple" data-ripple-color="#ffca28" style="background:white; color: #ff5722; font-size:13px;">READ MORE</button>		
						</div>
				</article>
			</a>
		</li>
		@endforeach
	</ul>
</div>



	
@stop