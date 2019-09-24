@extends('layouts.app')
@section('title','Login')
@section('css')
<style>
    {{--  .invalid-feedback{
        display:block;
    }  --}}
</style>
@endsection
@section('content')

<main>
	<div id="error_page">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-xl-7 col-lg-9">
						<h3 style="color:white"><i class="icon_error-triangle_alt"></i>	Your Account is Not Verified Yet </h3>

						<form>
							<div class="search_bar_error">
								<input type="text" class="form-control" placeholder="What are you looking for?">
								<input type="submit" value="Search">
							</div>
						</form>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /error_page -->
	</main>
	<!--/main-->

@endsection
