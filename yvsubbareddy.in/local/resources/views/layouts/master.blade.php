<!DOCTYPE html>
<html>
	<head>
		<title>Namo Venkatesaaya</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{URL('/')}}/assets/images/logo-1.png">
		<link rel="stylesheet" href="{{URL('/')}}/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="{{URL('/')}}/assets/css/style.css">

		<!-- <link rel="stylesheet" type="text/css" href="{{URL('/')}}/assets/css/main.css"> -->
	</head>
	<body>
		<!-- Header Starts -->
		<header>
			<div class="container">
			    <?php 
			    $Headslides  = DB::table('slides')->where('type','2')->get();
				?>
				<a class="navbar-brand" href="{{URL('/')}}"><img src="{{URL('/')}}/assets/images/04.png"></a>
			    <span class="logo-title"><a href="{{URL('/')}}">Namo Venkatesaaya</a></span>
			   <div class="float-right mt-2 images_round">
					<!--<span class="owner_img"><img src="{{URL('/')}}/assets/images/ys.jpg"></span>
					<span class="owner_img"><img src="{{URL('/')}}/assets/images/ysjagan.jpg"></span>
					<span class="owner_img"><img src="{{URL('/')}}/assets/images/yv.png"></span>-->
					<?php  if(count($Headslides)>0){ foreach($Headslides as $head){ ?>
					<span class="owner_img"><img class=" img img-responsive" src="{{URL('/')}}/local/public/slides/<?=$head->path;?>" ></span>
				<?php }
				} ?>
					
			    </div>
			</div>
		    <nav class="navbar navbar-expand-lg navbar-light bg-col">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			    <div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="navbar-nav ml-10">
				      <li class="nav-item active">
				        <a class="nav-link" href="{{URL('/')}}">Home <span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="{{route('visitor.about')}}">About Us</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="{{route('visitor.gallery')}}">Gallery</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="#">Events</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="{{route('visitor.contact')}}">Contact Us</a>
				      </li>
				    </ul>
			    </div>
			    <div class="mr-75 d-flex justify-content-between flex-wrap">
			    	<!--div class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Login
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="color: #b22f30;">
				          <a class="dropdown-item" href="{{ url('/login') }}">Admin</a>
				          <div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="{{ url('/login') }}">Chairmain</a>
				          <div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="{{ url('/login') }}">Office Staff</a>
				        </div>
				    </div-->
				    
				    <div class="nav-item " style="margin-right:5px;">
				    	<a href="{{ url('/login') }}"><button class="btn btn-success">Login</button></a>
				    </div>
				    <!--div class="nav-item">
				    	<button class="btn btn-success"><a href="{{route('visitor.create')}}">Registration</a></button>
				    </div-->
			    </div>
			</nav>
	    </header>
	    <!-- Header Ends -->
	    @yield('content')
        <!-- Footer Starts -->
        <footer>
        	<div class="footer-section">
        		<div class="container p-4">
        			<div class="row p-2">
        				<div class="col-md-3">
        					<span class="footer-heading-title">About Us</span>
        					<p class="mt-2">కలియుగ ధైవం శ్రీ వెంకటేశ్వర స్వామి వారికి సేవ చేసే భాగ్యం కలగటం నా పూర్వజన్మ సుకృతంగా భావిస్తున్నాను . స్వామి వారి దర్శనార్ధం వచ్చే భక్తులలో ఎటువంటి తారతమ్యాలకి చోటులేకుండా , అందరకీ ఒకేలా సకల సదుపాయాలు మరియు వీలయినంత త్వరగా స్వామి వారి దర్శనం చేసుకునేలా అన్ని ఏర్పాట్లు చేయటమయినది . 
భక్తులు అందరు స్వామి వారిని దర్శించుకుని , స్వామి అనుగ్రహం పొందుతారని ఆశిస్తున్నాను .
మీ వై వి సుబ్బారెడ్డి 
టి టి డి చైర్మన్</p>
        				</div>
        				<div class="col-md-3">
        					<span class="footer-heading-title">Useful Links</span>
        					<ul class="useful_links">
        						<li><a href="#">Registation</a></li>
        						<li><a href="#">Log in</a></li>
        						<li><a href="#">Temple Updates</a></li>
        						<li><a href="#">Events</a></li>
        					</ul>
        				</div>
        				<div class="col-md-3">
        					<span class="footer-heading-title">Contact Us</span>
        					<div class="mt-2">
        						<p class="footer-contact"><i class="far fa-envelope"></i>&nbsp; help@yvsubbareddy.in</p>
        						<p class="footer-contact"><i class="fas fa-phone"></i>&nbsp; +91 98481 75975</p>
        					</div>
        				</div>
        				<div class="col-md-3">
        					<span class="footer-heading-title">Follow Us on</span>
        					<div class="social-icons">
        						<span><a href="#"><i class="fab fa-facebook-f fa-2x"></i>Facebook</a></span>
        					    <span><a href="#"><i class="fab fa-twitter fa-2x"></i>twitter</a></span>
        					    <span><a href="#"><i class="fab fa-instagram fa-2x"></i>instagram</a></span>
        					</div> 
        				</div>
        			</div>
        		</div>
        		<div class="container-fluid">
        			<div class="d-flex justify-content-between">
	        			<div class="ml-2">
	        				<span>© 2018 - 2019 yvsubbareddy.in All Rights Reserved.</span>
	        			</div>
	        			<div class="company_url mr-2">
	        				<!--<a href="http://w3citservices.com/" target="_blank">Devloped by W3C IT SERVICES PVT LTD </a>-->
	        			</div>
        		    </div>
        		</div>
        	</div>
        </footer>
        <!-- Footer Ends -->
        <script src="{{URL('/')}}/assets/js/jquery.min.js"></script>
		<script src="{{URL('/')}}/assets/js/bootstrap.min.js"></script>
		<script src="{{URL('/')}}/assets/js/custom.js"></script>
		<script>
			$(function() {
			    $('marquee').mouseover(function() {
			        $(this).attr('scrollamount',0);
			    }).mouseout(function() {
			         $(this).attr('scrollamount',5);
			    });
			});
		</script>
	</body>
</html>