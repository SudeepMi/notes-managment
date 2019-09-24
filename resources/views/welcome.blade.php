@extends('layouts.app')
@section('title','Home')
@section('content')
	<main>
		<section class="hero_single version_2">
			<div class="wrapper">
				<div class="container">
					<h3>What would you learn?</h3>
					<p>Increase your expertise in business, technology and personal development</p>
					<form>
						<div id="custom-search-input">
							<div class="input-group">
								<input type="text" class=" search-query" placeholder="Ex. Architecture, Specialization...">
								<input type="submit" class="btn_search" value="Search">
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		<!-- /hero_single -->

		{{--  <div class="features clearfix">
			<div class="container">
				<ul>
					<li><i class="pe-7s-study"></i>
						<h4>+200 courses</h4><span>Explore a variety of fresh topics</span>
					</li>
					<li><i class="pe-7s-cup"></i>
						<h4>Expert teachers</h4><span>Find the right instructor for you</span>
					</li>
					<li><i class="pe-7s-target"></i>
						<h4>Focus on target</h4><span>Increase your personal expertise</span>
					</li>
				</ul>
			</div>
		</div>  --}}
		<!-- /features -->

		<div class="container-fluid margin_120_0">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Courses</h2>
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
                @foreach($courses as $course)
				<div class="item">
					<div class="box_grid">
						<div class="wrapper">
							<small>Category</small>
							<h3>{{ $course->name }}</h3>
							<p>Total Classes upto today : {{ $course->classes }}</p>
							<div class="rating">Notes <small>(145)</small></div>
						</div>
						<ul>
							<li><i class="icon_clock_alt"></i> Credit Hours {{ $course->credit_hours }}</li>
							<li><i class="icon_like"></i> Teacher {{ $course->teacher ?? 'None' }}</li>
							<li><a href="{{ route('coursedetail',$course->slug) }}">Notes</a></li>
						</ul>
					</div>
				</div>
			@endforeach
				<!-- /item -->
			</div>
			<!-- /carousel -->
			<div class="container">
				<p class="btn_home_align"><a href="courses-grid.html" class="btn_1 rounded">View all courses</a></p>
			</div>
			<!-- /container -->
			<hr>
		</div>
		<!-- /container -->




		<!--/call_section-->
	</main>
	<!-- /main -->

@endsection

@section('js')


	<!-- SPECIFIC SCRIPTS -->
	<script src="{{ asset('assets/js/jquery.cookiebar.js') }}"></script>
	<script>
		$(document).ready(function() {
			'use strict';
			$.cookieBar({
				fixed: true
			});
		});
	</script>

@endsection
