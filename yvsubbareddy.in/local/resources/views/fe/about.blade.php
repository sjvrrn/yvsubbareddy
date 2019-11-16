@extends('layouts.master')

@section('content')
<style>
.stext{
	font-size: inherit;
	padding-left: 13%;
	padding-right: 13%;
	font-family: sans-serif;
	padding-top: 1%;
	line-height: 406%;
	text-indent:23%;
}
</style>
<div class="container">
	@if(Session::has('success'))
	    			<div class="alert alert-success">
	    				{{ Session::get('success') }}
	    			</div>
	    			@elseif( Session::has( 'warning' ))
	    			<div class="alert alert-danger">
	    				{{ Session::get( 'warning' ) }}
	    			</div>
	    			@endif
	    	<div class="page-container card" style="margin-bottom: 180px;">
	    	
	    		<div class="row">

	    			<div class="col-md-8 col-xs-12 col-sm-12">
	    			    	<h4 class="abt-title mt-4 text-center">About Us</h4>
	    			<div class="stext">
కలియుగ ధైవం శ్రీ వెంకటేశ్వర స్వామి వారికి సేవ చేసే భాగ్యం కలగటం నా పూర్వజన్మ సుకృతంగా భావిస్తున్నాను . స్వామి వారి దర్శనార్ధం వచ్చే భక్తులలో ఎటువంటి తారతమ్యాలకి చోటులేకుండా , అందరకీ ఒకేలా సకల సదుపాయాలు మరియు వీలయినంత త్వరగా స్వామి వారి దర్శనం చేసుకునేలా అన్ని ఏర్పాట్లు చేయటమయినది . 
భక్తులు అందరు స్వామి వారిని దర్శించుకుని , స్వామి అనుగ్రహం పొందుతారని ఆశిస్తున్నాను .
మీ వై వి సుబ్బారెడ్డి 
టి టి డి చైర్మన్.
                   </div>     
	    			</div>
	    			<div class="col-md-4 col-xs-12 col-sm-12">
	    				<img src="assets/images/05.jpg" height="440" width="430">
	    			</div>
	    		</div>
	    	</div>
	    </div>
	    @endsection