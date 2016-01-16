@extends('Weabo.template.weabo_template')

@section('content')
	
	<div class="about-staff">
		<ul>
			<li>
				<article class="about-card">
					<div class="about-header on-header">
						<img src="{{ URL::asset('assets/img/ryou.png') }}" class="img-header lazyOwl" alt="">
					</div>
					<div class="about-content">
						<div class="about-profile">
							<img src="{{ URL::asset('assets/img/ryou_profile.png') }}" alt="">
						</div>
						<div class="about-title">
							RYOU
						</div>
						<div class="about-task">
							<p>Main Programmer</p>
							<p>SuperAdmin</p>
						</div>
					</div>
						<div class="about-bottom">
						
						</div>
				</article>			
			</li>
			<li>
				<article class="about-card">
					<div class="about-header on-header">
						<img src="{{ URL::asset('assets/img/seisha.png') }}" class="img-header lazyOwl" alt="">
					</div>
					<div class="about-content">
						<div class="about-profile">
							<img src="{{ URL::asset('assets/img/seisha_profile.png') }}" alt="">
						</div>
						<div class="about-title">
							SEISHA
						</div>
						<div class="about-task">
							<p>MultiTasking</p>
							<p>SuperAdmin</p>
						</div>
					</div>
						<div class="about-bottom">
						
						</div>
				</article>			
			</li>
			<li>
				<article class="about-card">
					<div class="about-header on-header">
						<img src="{{ URL::asset('assets/img/seisha.png') }}" class="img-header lazyOwl" alt="">
					</div>
					<div class="about-content">
						<div class="about-profile">
							<img src="{{ URL::asset('assets/img/seisha_profile.png') }}" alt="">
						</div>
						<div class="about-title">
							REEA
						</div>
						<div class="about-task">
							<p>Designer</p>
							<p>Admin</p>
						</div>
					</div>
						<div class="about-bottom">
						
						</div>
				</article>			
			</li>
			<li>
				<article class="about-card">
					<div class="about-header on-header">
						<img src="{{ URL::asset('assets/img/seisha.png') }}" class="img-header lazyOwl" alt="">
					</div>
					<div class="about-content">
						<div class="about-profile">
							<img src="{{ URL::asset('assets/img/seisha_profile.png') }}" alt="">
						</div>
						<div class="about-title">
							Nurlemmong
						</div>
						<div class="about-task">
							<p>Post & Review</p>
							<p>Admin</p>
						</div>
					</div>
						<div class="about-bottom">
						
						</div>
				</article>			
			</li>
		</ul>
	</div>
	

@stop