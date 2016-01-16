@extends('Weabo.template.weabo_template')

@section('content')


<div class="detail-anime">
	<div class="title-anime">
		<h4>{{ $detail->title }}</h4>
	</div>
	<div class="col-md-5 cover-section">
		<div class="anime-image">
			<img src="{{ $detail->cover }}" alt="">
		</div>
	</div>

	<div class="col-md-7 desc-section">
		<div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#detail-anime" data-toggle="tab">Detail Anime</a></li>
          <li><a href="#review" data-toggle="tab">Review</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane" id="review">
			<p>{{ $detail->description }}</p>
          </div><!-- /.tab-pane -->

          <div class="active tab-pane" id="detail-anime">
  			<table border="0" class="table table-hover">
				<tr>
					<td>
						Category
					</td>
					<td> : </td>
					<td style="word-break:break-all;">{{ $detail->category }}</td>
				</tr>
				<tr>
					<td>
						Studio
					</td>
					<td> : </td>
					<td>{{ $detail->studio }}</td>
				</tr>
				<tr>
					<td>
						Year
					</td>
					<td> : </td>
					<td>{{ $detail->year }}</td>
				</tr>
				<tr>
					<td>
						Rating
					</td>
					<td> : </td>
					<td>{{ $detail->rating }}</td>
				</tr>
				<tr>
					<td>
						Season
					</td>
					<td> : </td>
					<td>{{ $detail->season }}</td>
				</tr>
				<tr>
					<td>
						Credit
					</td>
					<td> : </td>
					<td>{{ $detail->credit }}</td>
				</tr>	
				<tr>
					<td>
						Status
					</td>
					<td> : </td>
					<td>{{ $detail->status }}</td>
				</tr>
			</table>          
          </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
      </div><!-- /.nav-tabs-custom -->
	</div>
</div>
<div class="episode-page">
	<h4 style="font-family: 'Roboto', sans-serif;padding-left:20px;" ><span class="label label-warning">EPISODES</span></h4>
	<div class="episode-link">
		<ul>
		@foreach($episode as $e)
			<li>
				<a href="{{url('anime/episode')}}/{{str_replace(' ', '_', $e->title)}}">
				    <article class="episode-card">
						<div class="episode-header">
							<img src="{{ $e->screenshot1 }}" class="img-header lazyOwl" alt="">
						</div>
						<div class="episode-content">
							<div class="episode-title" align="center">
								{{ substr($e->title,strpos($e->title,"EPISODE"),strlen($e->title)) }}
							</div>
						</div>
					</article>
				</a>
			</li>
		@endforeach
		</ul>
	</div>
</div>

@stop