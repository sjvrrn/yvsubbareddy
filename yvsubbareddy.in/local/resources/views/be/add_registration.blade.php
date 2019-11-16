@extends('layouts.app')

@section('content')
<div class="content">
	<style>
		.form-control{
			padding:0px !important;
		}
	</style>
	<?php 
	if(Auth::user()->user_type==1 || Auth::user()->user_type==2){
    if(Request::segment(2))
        $year = (int)Request::segment(2);
    if(Request::segment(3)){
        $month = (int)Request::segment(3);
        if($month<10) $month = '0'.$month;
    }
    if(Request::segment(4)){
        $date = (int)Request::segment(4);
        if($date<10) $date = '0'.$date;
        }
		$date = $year.'-'.$month.'-'.$date;
		}else{
			$date = "";
		}
	/*mla,mps list*/
$mla_list = array(
				'Achanta'=> 'CHERUKUVADA SRIRANGANADHA RAJU',
				'Addanki'=> 'GOTTIPATI RAVIKUMAR',
				'Adoni'=> 'Y. SAI PRASAD REDDY',
				'Allagadda'=> 'Gangula Brijendra Reddy (Nani)',
				'Alur'=> 'P Jayaram',
				'Amadalavalasa'=> 'THAMMINENI SEETHARAM',
				'Amalapuram'=> 'VISWARUPU PINIPE',
				'Anakapalli'=> 'A V S S Amarnath Gudivada',
				'Anantapur'=> 'Urban ANANTHA VENKATARAMI REDDY',
				'Anaparthy'=> 'DOCTOR. SATHI SURYANARAYANA REDDY',
				'Araku Valley'=> 'CHETTI. PALGUNA',
				'Atmakur'=> 'MEKAPATI GOUTHAM REDDY',
				'Avanigadda'=> 'RAMESH BABU SIMHADRI',
				'Badvel'=> 'DR. G VENKATA SUBBAIAH',
				'Banaganapale'=> 'KATASANI RAMI REDDY',
				'Bapatla'=> 'KONA RAGHUPATHI',
				'Bhimavaram'=> 'GRANDHI SRINIVAS',
				'Bhimli'=> 'MUTTAMSETTI SRINIVASARAO (AVANTHI SRINIVAS)',
				'Bobbli'=> 'SAMBANGI VENKATACHINA APPALA NAIDU',
				'Chandragiri'=> 'Dr.CHEVIREDDY BHASKAR REDDY',
				'Cheepurupalli'=> 'BOTCHA SATYANARAYANA',
				'Chilakaluripet'=> 'RAJINI VIDADALA',
				'Chintalapudi'=> 'VUNNAMATLA RAKADA ELIZA',
				'Chirala'=> 'KARANAM BALARAMA KRISHNA MURTHY',
				'Chittor'=> 'Aranii Srenevasulu (Jangalapalli)',
				'Chodavaram'=> 'KARANAM DHARMASRI',
				'Darsi'=> 'MADDISETTY VENUGOPAL',
				'Denduluru'=> 'ABBAYA CHOWDARY KOTHARI',
				'Dharmavaram'=> 'KETHIREDDY VENKATARAMI REDDY',
				'Dhone'=> 'Buggana Raja Reddy',
				'Elamanchili'=> 'UPPALAPATI VENKATA RAMANAMURTHY RAJU',
				'Eluru ALLA KALI KRISHNA SRINIVAS',
				'Etcherla'=> 'Gorle. Kiran Kumar',
				'Gajapathinagaram'=> 'APPALANARASAYYA BOTCHA',
				'Gajuwaka'=> 'NAGIREDDY TIPPALA',
				'Gangadhara Nellore'=> 'K. NARAYANA SWAMY',
				'Gannavaram'=> 'VAMSI VALLABHANENI',
				'Gannavaram (SC)'=> 'KONDETI CHITTI BABU',
				'Giddalur'=> 'Anna Rambabu',
				'Gopalapuram'=> 'Venkatrao Talari',
				'Gudivada'=> 'KODALI SRI VENKATESWARA RAO',
				'Gudur'=> 'Velagapalli Varaprasad Rao',
				'Guntakal'=> 'Y. VENKATARAMA REDDY',
				'Guntur'=> 'East MOHAMMED MUSTAFA SHAIK',
				'Guntur'=> 'West MADDALI GIRIDHARA RAO',
				'Gurazala'=> 'KASU MAHESH REDDY',
				'Hindupur'=> 'NANDAMURI BALAKRISHNA',
				'Ichchapuram'=> 'ASHOK BENDALAM',
				'Jaggampeta'=> 'Jyothula Naga Veera Venkata Vishnu Satya Marthanda Rao',
				'Jaggayyapeta'=> 'UDAYABHANU SAMINENI',
				'Jammalamadugu'=> 'MULE SUDHEER REDDY',
				'Kadapa'=> 'AMZATH BASHA SHAIK BEPARI',
				'Kadiri'=> 'P.V. SIDDA REDDY',
				'Kaikalur'=> 'DULAM NAGESWARA RAO',
				'Kakinada City'=> 'Dwarampudi Chandra Sekhara Reddy',
				'Kakinada Rural'=> 'Kurasala Kannababu',
				'Kalyandurg'=> 'K.V. Usha Sricharan',
				'Kamalapuram'=> 'POCHIMAREDDY RAVINDRANATH REDDY',
				'Kandukur'=> 'MAHEEDHAR REDDY MANUGUNTA',
				'Kanigiri'=> 'Burra Madhu Sudhan Yadav',
				'Kavali'=> 'RAMIREDDY PRATAP KUMAR REDDY',
				'Kodumur'=> 'JARADODDI SUDHAKAR',
				'Kodur'=> 'Koramutla Sreenivasulu',
				'Kondapi'=> 'DOCTOR DOLA SREE BALA VEERANJANEYA SWAMY',
				'Kothapeta'=> 'CHIRLA JAGGIREDDY',
				'Kovur'=> 'TANETI VANITA',
				'Kovvur'=> 'TANETI VANITA',
				'Kuppam'=> 'Nara Chandra Babu Naidu',
				'Kurnool'=> 'Abdul Hafeez Khan',
				'Kurupam'=> 'PUSHPASREEVANI . PAMULA',
				'Macherla'=> 'RAMAKRISHNAREDDY PINNELLI',
				'Machilipatnam'=> 'PERNI VENKATARAMAIAH (NANI)',
				'Madakasira'=> 'M THIPPESWAMY',
				'Madanapalle'=> 'Mohammed Nawaz Basha',
				'Madugula'=> 'BUDI MUTYALA NAIDU',
				'Mandapeta'=> 'JOGESWARA RAO. V',
				'Mangalagiri'=> 'Alla Rama Krishna Reddy (RK)',
				'Mantralayam'=> 'Y BALANAGI REDDY',
				'Markapuram'=> 'Kunduru Nagarjuna Reddy',
				'Mummidivaram'=> 'PONNADA VENKATA SATISH KUMAR',
				'Mydukur'=> 'Raghurami Reddy Settipally',
				'Mylavaram'=> 'VASANTHA VENKATA KRISHNA PRASAD',
				'Nagari'=> 'R.K. ROJA',
				'Nandigama'=> 'MONDITOKA JAGAN MOHANA RAO',
				'Nandikotkur'=> 'THOGURU ARTHUR',
				'Nandyal'=> 'SHILPA RAVI CHANDRA KISHORE REDDY',
				'Narasannapeta'=> 'DHARMANA KRISHNA DAS',
				'Narasapuram'=> 'MUDUNURI PRASADA RAJU',
				'Narasaraopet'=> 'GOPIREDDY SRINIVASAREDDY',
				'Narsipatnam'=> 'UMA SANKARA GANESH PETLA',
				'Nellimarla'=> 'APPALA NAIDU BADDUKONDA',
				'Nellore City'=> 'ANIL KUMAR POLUBOINA',
				'Nellore Rural'=> 'Kotamreddy Sridhar Reddy',
				'Nidadavole'=> 'G. Srinivas Naidu',
				'Nuzvid'=> 'Meka Venkata Pratap Apparao',
				'Ongole'=> 'BALINENI SRINIVASA REDDY (VASU)',
				'Paderu'=> 'BHAGYA LAKSHMI KOTTAGULLI',
				'Palacole'=> 'DR. NIMMALA RAMANAIDU',
				'Palakonda'=> 'VISWASARAYI KALAVATHI',
				'Palamaner'=> 'N VENKATE GOWDA',
				'Palasa'=> 'APPALARAJU SEEDIRI',
				'Pamarru'=> 'Anil Kumar Kaile',
				'Panyam'=> 'KATASANI RAMBHUPAL REDDY',
				'Parchur'=> 'YELURI SAMBA SIVARAO',
				'Parvathipuram'=> 'ALAJANGI JOGARAO',
				'Pathapatnam'=> 'REDDY SHANTHI',
				'Pattikonda'=> 'KANGATI SREEDEVI',
				'Payakaraopet'=> 'GOLLA BABURAO',
				'Pedakurapadu'=> 'SANKARA RAO NAMBURU',
				'Pedana'=> 'JOGI RAMESH',
				'Peddapuram'=> 'Nimmakayala China Rajappa',
				'Penamaluru'=> 'KOLUSU PARTHA SARATHY',
				'Pendurthi'=> 'ANNAMREDDY ADEEP RAJ',
				'Penukonda'=> 'MALAGUNDLA SANKARANARAYANA',
				'Pileru'=> 'CHINTHALA RAMACHANDRA REDDY',
				'Pithapuram'=> 'Dorababu Pendem',
				'Polavaram'=> 'TELLAM BALA RAJU',
				'Ponnur'=> 'Venkatroshaiah Kilari',
				'Prathipadu'=> 'Sri Purnachandra Prasad Parvatha',
				'Prathipadu (SC)'=> 'Mekathoti Sucharitha',
				'Proddatur'=> 'Rachamallu Siva Prasad Reddy',
				'Pulivendla'=> 'YEDUGURI SANDINTI JAGAN MOHAN REDDY',
				'Punganur'=> 'PEDDIREDDI RAMACHANDRA REDDY',
				'Puthalapattu'=> 'M. BABU',
				'Puttaparthi'=> 'DUDDUKUNTA SREEDHAR REDDY',
				'Rajahmundry City'=> 'ADIREDDY BHAVANI',
				'Rajam (SC)'=> 'KAMBALA JOGULU',
				'Rajampet'=> 'Meda Venkata Mallikarjuna Reddy',
				'Rajamundry Rural'=> 'Gorantla Butchaiah Choudary',
				'Rajanagaram'=> 'JAKKAMPUDI RAJA',
				'Ramachandrapuram'=> 'CHELLUBOYINA SRINIVASA VENUGOPALAKRISHNA',
				'Rampachodavaram'=> 'NAGULAPALLI DHANALAKSHMI',
				'Raptadu'=> 'Thopudurthi Prakash Reddy',
				'Rayachoti'=> 'GADIKOTA SRIKANTH REDDY',
				'Rayadurg'=> 'KAPU RAMACHANDRA REDDY',
				'Razole'=> 'RAPAKA VARA PRASADA RAO, Janasena Party',
				'Repalle'=> 'ANAGANI SATYA PRASAD',
				'Salur'=> 'PEEDIKA. RAJANNA DORA',
				'Santhanuthalapadu'=> 'T.J.R. Sudhakar Babu',
				'Sarvepalli'=> 'KAKANI GOVARDHAN REDDY',
				'Sattenapalli'=> 'AMBATI RAMBABU',
				'Satyavedu'=> 'Adimulam Koneti',
				'Singanamala'=> 'Padmavathy Jonnalagadda',
				'Srikakulam'=> 'DHARMANA PRASADA RAO',
				'Srikalahasti'=> 'Madhusudhan Reddy Biyyapu',
				'Srisailam'=> 'SILPA CHAKRAPANI REDDY',
				'Srungavarapukota'=> 'Kadubandi Srinivasa Rao',
				'Sullurpeta'=> 'Kiliveti Sanjeevaiah',
				'Tadepalligudem'=> 'KOTTU SATYANARAYANA',
				'Tadikonda'=> 'Vundavalli Sridev',
				'Tadpatri'=> 'K. PEDDA REDDY',
				'Tanuku'=> 'KARUMURI VENKATA NAGESWARA RAO',
				'Tekkali'=> 'ATCHANNAIDU KINJARAPU',
				'Tenali'=> 'ANNABATHUNI SIVA KUMAR',
				'Thamballapalle'=> 'PEDDIREDDY DWARAKANATHA REDDY',
				'Tirupati'=> 'BHUMANA KARUNAKAR REDDY',
				'Tiruvuru'=> 'Kokkiligadda Rakshana Nidhi',
				'Tuni'=> 'DADISETTI RAJA',
				'Udayagiri'=> 'MEKAPATI CHANDRA SEKHAR REDDY',
				'Undi'=> 'MANTENA RAMARAJU',
				'Unguturu'=> 'PUPPALA SRINIVASARAO',
				'Uravakonda'=> 'PAYYAVULA KESHAV',
				'Vemuru'=> 'MERUGU NAGARJUNA',
				'Venkatagiri'=> 'ANAM RAMANARAYANA REDDY',
				'Vijayawada'=> 'Central  VISHNU VARDHAN MALLADI',
				'Vijayawada East'=> 'Gadde Rama Mohan',
				'Vijayawada West'=> 'Velam Palli Srinivasa Rao',
				'Vinukonda Bolla'=> 'Brahma Naidu',
				'Visakhapatnam East'=> 'RAMAKRISHNA BABU VELAGAPUDI',
				'Visakhapatnam North'=> 'GANTA SRINIVASA RAO',
				'Visakhapatnam South'=> 'GANESH KUMAR VASUPALLI',
				'Visakhapatnam West'=> 'GANA VENKATA REDDY NAIDU PETHAKAMSETTI (GANA BABU)',
				'Vizianagaram'=> 'VEERA BHADRA SWAMY KOLAGATLA',
				'Yemmiganur'=> 'K CHENNAKESAVA REDDY',
				'Yerragondapalem'=> 'Audimulapu Suresh'
		);
$mp_list = array('Araku'=>'Goddeti Madhavi',
				'Srikakulam'=>'Ram Mohan Naidu Kinjarapu',
				'Vizianagaram'=>'Bellana Chandra Sekhar',
				'Visakhapatnam'=>'M. V. V. Satyanarayana',
				'Anakapalli'=>'Beesetti Venkata Satyavathi',
				'Kakinada'=>'Vanga Geetha',
				'Amalapuram'=>'Chinta Anuradha',
				'Rajahmundry'=>'Margani Bharat',
				'Narasapuram'=>'Kanumuru Raghu Rama Krishna Raju',
				'Eluru'=>'Kotagiri Sridhar',
				'Machilipatnam'=>'Balashowry Vallabhaneni',
				'Vijayawada'=>'Kesineni Srinivas',
				'Guntur'=>'Galla Jayadev',
				'Narasaraopet'=>'Lavu Sri Krishna Devarayalu',
				'Bapatla'=>'Nandigam Suresh',
				'Ongole'=>'Mugunta Sreenivasulu Reddy',
				'Nandyal'=>'Pocha Brahmananda Reddy',
				'Kurnool'=>'Ayushman Doctor Sanjeev Kumar',
				'Anantapur'=>'Talari Rangaiah',
				'Hindupur'=>'Kuruva Gorantla Madhav',
				'Kadapa'=>'Y. S. Avinash Reddy',
				'Nellore'=>'Adala Prabhakara Reddy',
				'Tirupati'=>'Balli Durga Prasad Rao',
				'Rajampet'=>'P. V. Midhun Reddy',
				'Chittoor'=>'N. Reddeppa'
		);
	?>
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
	    		<h4 class="abt-title mt-4">Registration</h4>
	    		<div class="row">

	    			<div class="col-md-8 col-xs-12 col-sm-12">
	    				<!-- <form action="" class="mt-5" name="myForm">  -->
	    				{{ Form::open(array('route' => 'visitor.store','class' => 'form-horizontal mt-5', 'name'=>'myForm')) }}                       
	    				<div class="form-group row">
	    					<div class="col-md-3">
	    						Name <span class="style1">&nbsp;*</span>
	    					</div>
	    					<div class="col-md-9">
	    						
	    						{{ Form::text('name',null,array('class' => 'form-control','placeholder'=>'Enter Name','required')) }}
	    						
	    						@if ($errors->has('name'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('name') }}</strong>
	    						</span> 
	    						@endif 
	    					</div>
	    				</div>
	                        
	                        <div class="form-group row">
	                            <div class="col-md-3">
	                                Mobile <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                               
	                                {{ Form::text('mobile',null,array('class' => 'form-control','placeholder'=>'Enter your Mobile No','required')) }}
	    						
	    						@if ($errors->has('mobile'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('mobile') }}</strong>
	    						</span> 
	    						@endif
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <div class="col-md-3">
	                                Total Members <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                
	                                {{ Form::number('total_members',null,array('class' => 'form-control','placeholder'=>'Enter your total No','required')) }}
	    						
	    						@if ($errors->has('total_members'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('total_members') }}</strong>
	    						</span> 
	    						@endif
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <div class="col-md-3">
	                                Darshanam Date <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                <!-- {{ Form::date('darshan_date','null',array('id'=>'darshan_date','class' => 'form-control','placeholder'=>'yyyy-mm-dd','required', 'min' =>  date('Y-m-d'))) }}  -->
	                                <?php if(Auth::user()->user_type==1 || Auth::user()->user_type==2){?>
	                                		 <input type="date" name='darshan_date1' class="form-control" value="<?php echo $date;?>" placeholder='yyyy/mm/dd' disabled>
	                                		 <input type="hidden" name="darshan_date" value="<?php echo $date;?>">
	                                	<?php }else{ ?>
	                                		  <input type="date" name='darshan_date' class="form-control"  min="date('Y-m-d')" required value="<?php echo $date;?>" >
	                                <?php } ?>
	                                 
	                                @if ($errors->has('darshan_date'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('darshan_date') }}</strong>
	    						</span> 
	    						@endif
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <div class="col-md-3">
	                                Darshanam Type <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                
	                            	<select name="darshan_type" class="form-control" required id="darshan_type">
	                            		<option value="">SELECT DARSHAN TYPE</option>
	                            		<option value="VIP BREAK">VIP BREAK</option>
	                            		<option value="SPECIAL DARSHNAM">SPECIAL DARSHNAM</option>
	                            		<option value="ACCOMIDATION">ACCOMIDATION</option>
	                            		<option value="ARJITHA SEAVAS">ARJITHA SEAVAS</option>
	                            	</select>
	                                @if ($errors->has('darshan_type'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('darshan_type') }}</strong>
	    						</span> 
	    						@endif
	                            </div>
	                        </div>
	                         <div class="form-group row" >
	                            <div class="col-md-3">
	                               SUB Darshanam Type 
	                            </div>
	                            <div class="col-md-9">
	                            	<select name="subdarshan_type_id" class="form-control" id='subdarshanam'>
	                            		<option value="">SELECT SUBDARSHAN</option>
	                            		<option value="1">SUPRABHATHAM</option>
	                            		<option value="2">THOMALA SEVA</option>
	                            		<option value="3">ARCHANA</option>
	                            		<option value="4">KALYNOTSAVAM</option>
	                            		<option value="5">ARJITHA BRAHMOTSAVAM</option>
	                            		<option value="6">DOLOTSAVAM</option>
	                            		<option value="7">VASANTHOTSAVAM</option>
	                            		<option value="8">SAHASRA DEEPALANKARA SEVA</option>
	                            		<option value="9">VISESHA POOJA</option>
	                            		<option value="10">ASTADALAPADA PADMARADHANA</option>
	                            		<option value="11">SAHASRAKALASHABHISHEKAM</option>
	                            		<option value="12">TIRUPPAVADA</option>
	                            		<option value="13">VASTRALANKA SEVA</option>
	                            		<option value="14">POORABHISHEKAM</option>
	                            		<option value="15">NIJAPADA DARSHANAM</option>
	                            		<option value="16">FLOAT FESTIVAL</option>
	                            		<option value="17">VASANTHOSTSAVAM(ANNUAL)</option>
	                            		<option value="18">PADMAVATHI PARINAYAM</option>
	                            		<option value="19">ABHIDEYAKA ABHISHEKAM</option>
	                            		<option value="20">PUSHPA PALLAKI</option>
	                            		<option value="21">PAVITHROTSAVAM</option>
	                            		<option value="22">PUSHPA YAGAM</option>
	                            		<option value="23">KALYNOTSAVAM</option>
	                            		<option value="24">KOLL ALWAR TIRUMANJANAM</option>
	                            	</select>
	                              </div>
	                        </div>
	                        <div class="form-group row">
	                            <div class="col-md-3">
	                                Accomidation Date <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                                {{ Form::date('accom_date',null,array('class' => 'form-control','placeholder'=>'yyyy-mm-dd','required', 'min' =>  date('Y-m-d'))) }} 
	                                @if ($errors->has('accom_date'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('accom_date') }}</strong>
	    						</span> 
	    						@endif
	                            </div>
	                        </div>
	                        <div class="form-group row mt-2">
	                            <div class="col-md-3">
	                                Reference <span class="style1">&nbsp;*</span>
	                            </div>
	                             <div class="col-md-9">
	                            <?php if(Auth::user()->user_type==1 || Auth::user()->user_type==2){
	                            	$user_type = Auth::user()->user_type;
	                            	?>
	                                <select name="reference1" class="form-control" id="reference" required disabled>
                                    
                                    <option <?php if($user_type==1) echo"selected"; ?> value="MLA">MLA</option>
                                    <option <?php if($user_type==2) echo"selected"; ?> value="MP">MP</option>
                                    <option value="Other">Other</option>
                                    
                                </select>
 
                                <input type="hidden" name="reference" value="<?php echo $user_type; ?>">
	                          <?php  }else{ ?>
	                            	
	                                <select name="reference" class="form-control" id="reference" required>
                                    
                                    <option value="MLA">MLA</option>
                                    <option value="MP">MP</option>
                                    <option value="Other">Other</option>
                                    
                                </select>

	                           <?php  } ?>
	                           
                                @if ($errors->has('reference'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('reference') }}</strong>
                                </span>
                                @endif
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <div class="col-md-3">
	                                Ref Name <span class="style1">&nbsp;*</span>
	                            </div>
	                            <div class="col-md-9">
	                               <?php  
	                               if(Auth::user()->user_type){
		                               if(Auth::user()->user_type==1 || Auth::user()->user_type==2){$username = Auth::user()->name;}else{ $username = "";}
		                               }
		                            if(Auth::user()->user_type==1 || Auth::user()->user_type==2){?>
		                            <input type="text" name="ref_name1" value="<?php echo $username;?>" class="form-control" disabled>
		                            <input type="hidden" name="ref_name" value="<?php echo $username;?>">
		                          <?php  }else{ ?>
	                              {{ Form::text('ref_name',$username,array('class' => 'form-control','placeholder'=>'Eg: YV Subbareddy garu','required')) }}
	                              <!--	<select name="ref_name" class="form-control" id="ref_name">
									<option>Select Reference Name</option>
									</select>-->
	                            <?php  } ?>
	                              @if ($errors->has('ref_name'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('ref_name') }}</strong>
	    						</span> 
	    						@endif
	                            </div>
	                        </div>
	                        <!---Constituency 
							<div class="form-group row">
	    					<div class="col-md-3">
	    						Constituency <span class="style1">&nbsp;*</span>
	    					</div>
	    					<div class="col-md-9">
	    						
	    						{{ Form::text('constituency',null,array('class' => 'form-control','id'=>'constituency','placeholder'=>'Enter Constituency','required')) }}
	    						
	    						@if ($errors->has('name'))
	    						<span class="help-block">
	    							<strong>{{ $errors->first('name') }}</strong>
	    						</span> 
	    						@endif 
	    					</div>
	    				</div>
							-end-->
	                        <div class="form-group row">
	                            <div class="col-md-3">&nbsp;</div>
	                            <div class="col-md-9"> 
	                            	{{ Form::token() }}
	                                <input id="input-submit" value="Submit" type="submit" class="btn btn-success">
	                            </div>
	                        </div>

                     
                    {{ Form::close() }}
                        
	    			</div>
	    			
	    		</div>
	    	</div>
	    </div>
	    	<script>
		$(document).ready(function(){ 
		/* 
		 *mla,mp dynamic config
		 */
		$(document).on('change','#reference',function(){
			var myOptions = '';
			var ref_type = $(this).val();
			var mySelect = $('#ref_name');
			$("#ref_name").html('<option>select Reference</option>');
			if(ref_type==="MLA"){ 
				var myOptions = '<?php echo json_encode($mla_list);?>';
			}else if(ref_type==="MP"){ 
				var myOptions = '<?php echo json_encode($mp_list);?>';
			}
			$.each(JSON.parse(myOptions), function(val, text) {
					 mySelect.append(
						$('<option></option>').val(text).html(text)
					);
				});
			
		  });
		  /* 
           *constituency config
		   */
		   $(document).on('change','#ref_name',function(){
			   var ref_name = $(this).val();
			   ref_name = ref_name.trim();
			   var ref_type = $("#reference").val();
			   //var cons = "";
			   console.log(ref_name);
			   if(ref_type==="MLA"){ 
				var myOptions = '<?php echo json_encode($mla_list);?>'; 
				$.each(JSON.parse(myOptions), function(val, text) {
					if(text===ref_name){  var cons = val; $("#constituency").val(cons);}
				});
				}else if(ref_type==="MP"){ 
				var myOptions = '<?php echo json_encode($mp_list);?>';
				$.each(JSON.parse(myOptions), function(val, text) {
					if(text===ref_name){  var cons = val; $("#constituency").val(cons);}
				});
				}
				
			
			   
		   });
		});
		</script>
	
	    @endsection

	