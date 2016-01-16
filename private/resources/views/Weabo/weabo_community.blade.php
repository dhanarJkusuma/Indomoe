@extends('Weabo.template.weabo_template')

@section('content')

<div class="content-community">
	<h4 style="text-align:center; color:#ffca28;"><b>Follow Us !</b></h4>
	<ul>
		<li >
			<a href="https://www.facebook.com/indomoe2016/">
				<img src="{{ URL::asset('assets/img/fb.png') }}" alt="">
			</a>
		</li>
		<li >
			<a href="https://twitter.com/indo_moe">
				<img src="{{ URL::asset('assets/img/twitter.png') }}" alt="">
			</a>
		</li>
		<li style="text-align:center;">
			<a href="https://plus.google.com/118301834093660685296/posts">
				<img src="{{ URL::asset('assets/img/gplus.png') }}" alt="">
			</a>
		</li>
		<li style="text-align:center;">
			<a href="http://line.me/ti/p/%40weu3052v">
				<img style="margin-left:auto;margin-right:auto;text-align:center;" src="{{ URL::asset('assets/img/line.png') }}" width="64" height="64" alt="">
			</a>
		</li>
	</ul>
	<h4 style="text-align:center; color:#ffca28;"><b>Contact Us  !</b></h4>
	<p align="center"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;&nbsp; indomoe2015@gmail.com</p>
	<div class="donate-me">
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="S38Y7932ECW56">
			<input type="image" src="https://www.paypalobjects.com/id_ID/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/id_ID/i/scr/pixel.gif" width="1" height="1">
		</form>
	</div>
</div>

@stop