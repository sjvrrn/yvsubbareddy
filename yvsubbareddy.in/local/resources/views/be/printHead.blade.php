 <link rel="stylesheet" type="text/css" href="{{URL('/')}}/assets/css/style.css">
    <style>
        #iinfo{
            font-family:serif;
        }
        #stext{
        font-family: sans-serif;
        color: #fb2020c7;
        font-weight: 550;
        }        
        #mcontent{
            text-align:justify;
        }
    </style>
<?php

 $constituences = array(
                'Achanta','Addanki','Adoni','Allagadda','Alur','Amadalavalasa',    'Amalapuram',
                'Anakapalli','Anantapur','Anaparthy','Araku Valley','Atmakur','Avanigadda',
                'Badvel','Banaganapale','Bapatla','Bhimavaram',    'Bhimli','Bobbli','Chandragiri',
                'Cheepurupalli','Chilakaluripet','Chintalapudi','Chirala','Chittor',
                'Chodavaram','Darsi','Denduluru','Dharmavaram','Dhone','Elamanchili',
                'Eluru','Etcherla',    'Gajapathinagaram',    'Gajuwaka',    'Gangadhara Nellore',
                'Gannavaram','Gannavaram (SC)',    'Giddalur',    'Gopalapuram',    'Gudivada',
                'Gudur','Guntakal',    'Guntur','Guntur','Gurazala','Hindupur','Ichchapuram',
                'Jaggampeta','Jaggayyapeta','Jammalamadugu','Kadapa','Kadiri','Kaikalur',
                'Kakinada City','Kakinada Rural','Kalyandurg','Kamalapuram','Kandukur',
                'Kanigiri',    'Kavali','Kodumur','Kodur',    'Kondapi','Kothapeta','Kovur',
                'Kovvur','Kuppam','Kurnool','Kurupam','Macherla','Machilipatnam','Madakasira',
                'Madanapalle','Madugula','Mandapeta','Mangalagiri',    'Mantralayam','Markapuram',
                'Mummidivaram',    'Mydukur','Mylavaram','Nagari',    'Nandigama','Nandikotkur',
                'Nandyal','Narasannapeta',    'Narasapuram',    'Narasaraopet',    'Narsipatnam',
                'Nellimarla','Nellore City','Nellore Rural','Nidadavole','Nuzvid','Ongole',
                'Paderu','Palacole','Palakonda','Palamaner','Palasa','Pamarru',    'Panyam',
                'Parchur',    'Parvathipuram','Pathapatnam','Pattikonda',    'Payakaraopet',
                'Pedakurapadu',    'Pedana','Peddapuram','Penamaluru',    'Pendurthi','Penukonda',
                'Pileru','Pithapuram','Polavaram','Ponnur',    'Prathipadu','Prathipadu (SC)',
                'Proddatur','Pulivendla','Punganur','Puthalapattu',    'Puttaparthi','Rajahmundry City','Rajam (SC)','Rajampet','Rajamundry Rural','Rajanagaram','Ramachandrapuram',
                'Rampachodavaram','Raptadu','Rayachoti','Rayadurg','Razole','Repalle',
                'Salur','Santhanuthalapadu','Sarvepalli','Sattenapalli','Satyavedu','Singanamala',
                'Srikakulam','Srikalahasti','Srisailam','Srungavarapukota','Sullurpeta',
                'Tadepalligudem','Tadikonda','Tadpatri','Tanuku','Tekkali','Tenali',            'Thamballapalle','Tirupati','Tiruvuru',    'Tuni',    'Udayagiri','Undi',    'Unguturu',
                'Uravakonda','Vemuru','Venkatagiri','Vijayawada','Vijayawada East',            'Vijayawada West',    'Vinukonda Bolla','Visakhapatnam East','Visakhapatnam North',
                'Visakhapatnam South','Visakhapatnam West','Vizianagaram','Yemmiganur',
                'Yerragondapalem'
        ); 
if(count($data)<=0){
    echo"<div class='alert alert-danger text-center' id='iinfo'>Invalid Information</div>"; die;
    
}
$data = $data[0];  
$constituency = $constituences[$data->mconstituency]; 
/*$dt = new DateTime($data->darshan_date); 
$date = $dt->format('d');

$monthNum = $dt->format('m');
$year     = $dt->format('y');
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = substr($dateObj->format('F'),0,3); */// March

$name      = $data->name;
$total_members = $data->total_members; 
$darshan_date= date('dS F Y', strtotime($data->darshan_date));
$accom_date = date('dS F Y', strtotime($data->accom_date));

 ?>
<!DOCTYPE html>
<html>
   <head>
    <title>TTD Letter Head</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container-fluid" id='DivIdToPrint'>
           <div class="page-container">
            <div class="row">
                    <div class="col-md-2 col-xs-0 col-sm-0"></div> 
                    <!-- mt-2-->
                    <div class=" col-md-3 col-xs-5 col-sm-5" id="stext">
                      <?php  echo $data->mname.'<br>';
                                if($data->mtype==1) 
                                  $status ="Member of the Legislative Assembly.";
                                else 
                                $status ="member of parliament";

                                echo $status.'<br>';
                                echo $constituency.'<br>';
                                 ?>
                        
                    </div>
                    <div class="col-md-3 col-xs-3 col-sm-3">
                        <?php if($data->mtype==2){?>
                        <img class="img img-reponsive" src="{{url('/')}}/assets/images/satyamevajayathe.png"/>
                        <?php }else{ ?>
                        <img class="img img-reponsive" src="{{url('/')}}/assets/images/mla.png"/>
                        <?php }?>
                    </div>
                    <div class="col-md-3 col-xs-3 col-sm-3"  id="stext">
                        <p>
                        <?php echo $data->maddress.'<br>';
                        echo $data->memail.'<br>';
                        echo $data->mmobile; ?>
                        </p>
                    </div>
                    <div class="col-md-1 col-xs-0 col-sm-0"></div> 
            </div>
            <div class="row">
                   <!-- Adds Start -->
                    <div class="col-md-2 col-xs-4 col-sm-4"> </div>
                    <!-- Adds End -->
                   <div class="col-md-8 col-xs-12 col-sm-8" id="textID">
                   <div class="content">
                           <p>Ref:RR/TTD/<?php echo $data->id?></p>
                           <p>Date:<?php echo substr($data->created_at,0,10);?></p>
                       <span class="d-block">To</span> 
                       <span class="d-block"><b>The Joint Executive Officer,</b></span>
                       <span class="d-block">Tirumala Tirupathi Devasthanam,</span>
                       <span class="d-block">TIRUMALA.</span>
                       <p class="mt-4">Dear Sir,</p>
                       <p>Sri <b><?php echo $data->name;?></b> is arriving Tirumala on <b><?php echo $accom_date;?></b> along with his family consisting of <b>(<?php echo $data->total_members; ?>)</b> members to worship <b>LORD VENKATESHWARA SWAMY VARU</b> and they will stay for One Day. </p>
                       <p>I request you to provide <b>Good</b> accommodation (A.C.Rooms) for One Day i.e. on <b><?php echo $accom_date;?></b> necessary arrangements of <b>(<?php echo $data->total_members; ?>)</b> tickets <b><?php echo $data->darshan_type;?></b> on <b><?php echo $darshan_date;?></b> on usual terms and conditions.</p>

                       <p>Thank you,</p>
                       <p>With Regards</p>
                       <p><b>(<?php echo $data->mname; ?>)</b></p>
                       <p>Note: Please Produce this letter along with ID Proofs, at the JEO Office on the day of arrival before 12:00 Noon</p>
                   </div>
                  </div>
                  <!-- Adds Start -->
                   <div class="col-md-3 col-xs-2 col-sm-2"> </div>
                  <!-- Adds End -->
            </div>  
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    </body>
</html>