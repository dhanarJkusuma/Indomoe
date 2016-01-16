<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Indomoe :: Moe Indonesia</title>
	<link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/dist/css/AdminLTE.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/css/indomoe.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/css/carding.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/plugins/owl/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/plugins/owl/css/owl.theme.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/css/ripple.css') }}">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
	<style>
		
	</style>
	<style>
		#content
		{
			background: url('{{ URL::asset("assets/img/azusa.jpg") }}'),url('{{ URL::asset("assets/img/azusa.jpg") }}'), #ffffff;
  			background-repeat: no-repeat;
  			background-position: top left,top right;
		}
		.modal .modal-body {
		    max-height: 420px;
		    overflow-y: auto;
		}

		.loader
		{
			margin-top: 100px;
			margin-right: auto;
			margin-left: auto;
			background: url('{{ URL::asset("assets/img/loader.gif") }}');
			width: 64px;
			height: 51px;
		}
	</style>
</head>
<body>
		<div id="content-header">
			<img src="{{ URL::asset('assets/img/indomoe_header.png') }}" alt=""  class="con-header">
		</div>
		
		<nav class="horizontal-nav" id="horizontal-nav">
		<ul>
			<li><a href="{{ url('/') }}"> IndoMoe</a></li>
			<li><a href="{{ url('vocaloid') }}"> Vocaloid</a></li>
			<li><a href="{{ url('anime/list') }}"> List Anime</a></li>
			<li><a href="{{ url('community') }}"> Community</a></li>
			<li><a href="{{ url('about_us') }}"> About Us</a></li>
			<li><a id="search-btn"><span class="glyphicon glyphicon-search"></span></a></li>
			<div class="bugs" style="width:100%;margin-left:auto;margin-right:auto;text-align:center; margin-top:20px;">
			<p>This Website is under improvement, Please report to us if you find some bugs to indomoe2015@gmail.com.</p>
			</div>	
		</ul>

		<div class="search-box">
			<form action="#" method="POST" id="form-search">
				<div class="input-group">
			      <input type="text" class="form-control" name="keyword" placeholder="Search for...">
			      <input type="hidden" name="_token" value="{{ csrf_token() }}">
			      <span class="input-group-btn">
			        <button type="submit" class="tmbl-cari btn btn-warning" type="button"><span class="glyphicon glyphicon-search"></span></button>
			      </span>
			    </div>
			</form>
		</div>
	</nav>
	
	<div class="modal fade" id="search-result">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Search Result</h4>
          </div>
          <div class="modal-body">
            <div class="result">
            	<p id="data-return"></p>
	            <ul id="hasil-pencarian">
	            	
	            </ul>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
	
	
	
	<section id="content">
		<div id="content-wrapper">
			
			<div id="content-blade">
				@yield('content')
			</div>
		</div>
	</section>
	<script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/owl/js/owl.carousel.min.js') }}"></script>
	<script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
   	<script src="{{ URL::asset('assets/js/ripple.js') }}"></script>

	<script>
		$(document).ready(function(){      
		  	$('.on-going').tooltip();
		  	$('.category').tooltip();
		   	$('.onging-anime').owlCarousel({
			    loop:true,
				center:true,
			    margin:25,
			    autoWidth:true,
				autoplay:true,
			    autoplayTimeout:3000,
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:3
			        },
			        1000:{
			            items:5
			        }
			    }
			});

		   	$('.category-anime').owlCarousel({
			    loop:true,
				center:true,
			    margin:25,
			    autoWidth:true,
				autoplay:true,
			    autoplayTimeout:3000,
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:3
			        },
			        1000:{
			            items:5
			        }
			    }
			});

	
		$('#search-btn').on('click',function(){
			if($('.search-box').hasClass('keluar'))
			{
				$('.search-box').removeClass('keluar').addClass('masuk');
			}
			else if($('.search-box').hasClass('masuk'))
			{
				$('.search-box').removeClass('masuk').addClass('keluar');
			}
			else
			{
				$('.search-box').addClass('masuk');
			}
		});	

			$('#form-search').on('submit',function(){
				$('#hasil-pencarian li').remove();
				searching($(this));
				$('#search-result').modal('show');
				
				return false;
			});
		});

		function searching(form)
		{
			list = document.getElementById('hasil-pencarian');
			$.ajax({
		          url: "{{ url('weabo/search') }}",
		          type: "POST",
		          async:false,
		          data: $(form).serialize(),
		          success: function(result) { 
		          	
		          		$.each(result, function( i, val ) {
							if((val.card).indexOf("card") > -1)
							{
								var entry = document.createElement('li');
								$(entry).html(val.card);
								list.appendChild(entry);	
							}
							else
							{
								var entry = document.createElement('li');
								$(entry).html("<p>not found</p>");
								list.appendChild(entry);	
							}
							
			         		
		          	});     
		         	  
		         },
		         error: function(xhr, status, error) {
		         		alert(xhr.responseText);
		            } 
		      });
		}
	</script>	
	<script>
		    /**
     * Vertically center Bootstrap 3 modals so they aren't always stuck at the top
     */
    $(function() {
        function reposition() {
            var modal = $(this),
                dialog = modal.find('.modal-dialog');
            modal.css('display', 'block');
            
            // Dividing by two centers the modal exactly, but dividing by three 
            // or four works better for larger screens.
            dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
        }
        // Reposition when a modal is shown
        $('.modal').on('show.bs.modal', reposition);
        // Reposition when the window is resized
        $(window).on('resize', function() {
            $('.modal:visible').each(reposition);
        });
    });
	</script>
</body>
</html>