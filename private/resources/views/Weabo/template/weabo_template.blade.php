<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Indomoe :: Moe Indonesia</title>
	<link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/css/nav-bar.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/dist/css/AdminLTE.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/css/carding.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/plugins/owl/css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/plugins/owl/css/owl.theme.css') }}">
	<style>
		
	</style>
	<style>
		#content
		{
			background: url('{{ URL::asset("assets/img/azusa.jpg") }}'),url('{{ URL::asset("assets/img/azusa.jpg") }}'), #ffffff;
  			background-repeat: no-repeat;
  			background-position: top left,top right;
			
		}

	</style>
</head>
<body>
		<div id="content-header">
			<img src="{{ URL::asset('assets/img/moe.jpg') }}" alt=""  class="con-header">
		</div>
		
		<nav class="horizontal-nav" id="horizontal-nav">
		<ul>
			<li><a href="">Home</a></li>
			<li><a href="">List Anime</a></li>
			<li><a href="">About Us</a></li>
			<li><a id="search-btn"><span class="glyphicon glyphicon-search"></span></a></li>
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
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modal Default</h4>
          </div>
          <div class="modal-body">
            <p id="data-return"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
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
   
	<script>
		$(document).ready(function(){      
/*	 $(document).scroll(function () {
        var scroll = $(this).scrollTop();
        var topDist = $("#container").position();
        if (scroll > topDist.top) {
            $('nav').css({"position":"fixed","top":"0"});
        } else {
            $('nav').css({"position":"static","top":"auto"});
        }
    });

*/		   	$('.owl-carousel').owlCarousel({
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
			})  


	
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
				searching($(this));
				$('#search-result').modal('show');
				
				return false;
			});
		});

		function searching(form)
		{
			$.ajax({
		          url: "{{ url('weabo/search') }}",
		          type: "POST",
		          async:false,
		          data: $(form).serialize(),
		          success: function(result) {              
					$('#data-return').text(result);
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