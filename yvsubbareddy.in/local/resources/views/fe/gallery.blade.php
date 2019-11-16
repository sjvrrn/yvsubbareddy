@extends('layouts.master')

@section('content')
<div class="container-fluid">
        	<div class="page-container">
        		<h4 class="abt-title mt-4">Photo Gallery</h4>
        		<div class="tz-gallery">
        			<div class="row">
	        			<div class="col-md-4">
	        				<div class="card mb-2">
			                    <a class="lightbox" href="{{URL('/')}}/assets/images/01.jpeg">
			                    <img src="{{URL('/')}}/assets/images/01.jpeg" alt="" class="card-img-top">
	                    		</a>
	                		</div>
	        			</div>
	        			<div class="col-md-4">
	        				<div class="card mb-2">
			                    <a class="lightbox" href="{{URL('/')}}/assets/images/02.jpg">
			                    <img src="{{URL('/')}}/assets/images/02.jpg" alt="" class="card-img-top">
	                    		</a>
	                		</div>
	        			</div>
	        			<div class="col-md-4">
	        				<div class="card mb-2">
			                    <a class="lightbox" href="{{URL('/')}}/assets/images/03.jpg">
			                    <img src="{{URL('/')}}/assets/images/03.jpg" alt="" class="card-img-top">
	                    		</a>
	                		</div>
	        			</div>
        			</div>
        			<div class="row">
	        			<div class="col-md-4">
	        				<div class="card mb-2">
			                    <a class="lightbox" href="{{URL('/')}}/assets/images/01.jpeg">
			                    <img src="{{URL('/')}}/assets/images/01.jpeg" alt="" class="card-img-top">
	                    		</a>
	                		</div>
	        			</div>
	        			<div class="col-md-4">
	        				<div class="card mb-2">
			                    <a class="lightbox" href="{{URL('/')}}/assets/images/02.jpg">
			                    <img src="{{URL('/')}}/assets/images/02.jpg" alt="" class="card-img-top">
	                    		</a>
	                		</div>
	        			</div>
	        			<div class="col-md-4">
	        				<div class="card mb-2">
			                    <a class="lightbox" href="{{URL('/')}}/assets/images/03.jpg">
			                    <img src="{{URL('/')}}/assets/images/03.jpg" alt="" class="card-img-top">
	                    		</a>
	                		</div>
	        			</div>
        			</div>
        		</div>
        	</div>
        </div>
@endsection