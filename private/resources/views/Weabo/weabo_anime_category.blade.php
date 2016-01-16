@extends('Weabo.template.weabo_template')

@section('content')


<div class="content-list">
	<div class="option-alpha">		
	    <div class="form-group">
	      <label>Category</label>
	      <div class="row">
	      <div class="col-md-12">
	        <select class="form-control" name="category" id="category">
	          
	        </select>
	      </div>
	      </div>
	    </div>
	</div>
	<div class="result-select" id="result-select">
		<ul>
			@foreach($animes as $anime)
			<li>
				<a href="{{url('anime/episode')}}/{{str_replace(' ', '_', $anime->title)}}">
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
<script>
	$(document).ready(function(){
   		getCategory();
		$('#category').val("{{ $category }}");

		$('#category').on('change',function(){
			window.location = "{{ url('anime/list/category') }}/" + $('#category').val();
		});
	});



	function getCategory()
    {
        $.ajax({
            url: "{{ url('admin/category/data') }}",
            type: "GET",
            async: false,
            success: function(s) {
              $.each( s, function( i, val ) {
                var option = document.createElement("option");
                option.value = val.category;
                option.text = val.category;
                document.getElementById('category').appendChild(option);
              });
           },
           error: function(xhr, status, error) {
            } 

        });
    }


</script>



@stop



