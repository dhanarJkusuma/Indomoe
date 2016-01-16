@extends('Weabo.template.weabo_template')

@section('content')
	
	<div class="episode-anime">
		<div class="title-anime">
			<h4>{{ $episode->title }}</h4>
		</div>
		<div class="col-md-12">
			<div class="anime-image episode-image">
				<div class="direct-image">
					<img src="{{ $episode->screenshot1 }}" alt="">
				</div>
			</div>
			<div class="nav-tabs-custom desc-episode">
		        <ul class="nav nav-tabs">
		          <li class="active"><a href="#detail-anime" data-toggle="tab">Detail Anime</a></li>
		          <li><a href="#download" data-toggle="tab">Download</a></li>
		          <li><a href="#ss" data-toggle="tab">ScreenShot</a></li>
		          <li><a href="#review" data-toggle="tab">Review</a></li>
		        </ul>
		        <div class="tab-content">
		          <div class="tab-pane" id="review">
					<p>{{ $detail->description }}</p>
		          </div><!-- /.tab-pane -->

		          <div class="tab-pane" id="ss">
					<div class="ss">
						<div class="ss-tengah">
							<img src="{{ $episode->screenshot2 }}" alt="">	
		          		</div>
		          		<div class="ss-tengah">
							<img src="{{ $episode->screenshot3 }}" alt="">	
		          		</div>
		          	</div>
		          </div>

		          <div class="tab-pane" id="download">
					<table border="0" class="table table-hover">
						@if(count($download)>0)
						<tr>
							<td width="{{ 100/count($download) }}" colspan="{{ count($download) }}" style="text-align:center;">
								<b>480p</b>
							</td>
						</tr>
						<tr>
							<td width="{{ 100/count($download) }}" style="text-align:center;">
								|
								@foreach($download as $d)
									@if($d->r480p != ''||$d->r480p != null)
										<a target="_blank" class="link" href="{{ $d->r480p }}" style="color:#ffca28"><b>{{ $d->title }}</b></a> |
									@else
										<a id="coret" class="link"><b>{{ $d->title }}</b></a> |
									@endif
								@endforeach
								
							</td>
						</tr>
						<tr>
							<td width="{{ 100/count($download) }}" colspan="{{ count($download) }}" style="text-align:center;">
								<b>720p</b>
							</td>
						</tr>
						<tr>
							<td width="{{ 100/count($download) }}" style="text-align:center;">
								|
								@foreach($download as $d)
									@if($d->r720p != ''||$d->r720p != null)
										<a target="_blank" class="link" href="{{ $d->r720p }}" style="color:#ffca28"><b>{{ $d->title }}</b></a> |
									@else
										<a id="coret" class="link"><b>{{ $d->title }}</b></a> |
									@endif
								@endforeach
								
							</td>
						</tr>

						<tr>
							<td width="{{ 100/count($download) }}" colspan="{{ count($download) }}" style="text-align:center;">
								<b>DIRECT LINK</b>
							</td>
						</tr>
						<tr>
							<td width="{{ 100/count($download) }}" style="text-align:center;">
								|
								@foreach($download as $d)
									@if($d->direct_link != ''||$d->direct_link != null)
										<a target="_blank" class="link" href="{{ $d->r720p }}" style="color:#ffca28"><b>{{ $d->title }}</b></a> |
									@else
										<a id="coret" class="link"><b>{{ $d->title }}</b></a> |
									@endif
								@endforeach
							</td>
						</tr>

						@endif
					</table>
		          </div>

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
	
	<script>
	var emot = 0;
		$(document).ready(function(){
		$('#kaskus_emot').live('click',function(e){                
		    if(emot == 0){
		        emot = '1';
		        $(this).text("[-] Emoticons").show(); // ubah menjadi  [-] Emoticons pada klik pertama
		        $.post("emoticons.php",{show:'true'}, function(data){
		        $("#show_emot").html(data).slideDown(); // tampilkan emoticon yang ada
		         });
		     }else{
		         emot = '0';
		         $(this).text("[+] Emoticons").show(); // ubah menjadi  [+] Emoticons pada klik kedua
		          $("#show_emot").slideUp();
		      }
		 });
		               
		 $('#show_emot #view').live('click',function(){ // ketika image di klik
		      var emot, komen, hasil;
		                    
		     emot = $(this).attr('title'); // variabel yg menampung value images yg di klik
		     komen = $("#komentar").val(); // variabel yg menampung isi dari textarea
		     hasil = komen +" "+ emot; // gabungkan value yg ada di komentar dengan  hasil klik
		                   
		     $("#komentar").val(hasil); // masukkan hasilnya di textarea
		   });
});
</script>
@stop