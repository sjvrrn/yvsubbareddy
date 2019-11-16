<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Visitor;
use App\Message;
use App\Slides;
use App\Contact;
use App\Url;
use App\User;
use App\Responses;
use Auth;
use DB;
use Exporter;
use File;

class VisitorController extends Controller
{

	public function home()
	{
	    
	   $slides      = DB::table('slides')->where('type','1')->get();
      $Headslides  = DB::table('slides')->where('type','2')->get();
      $data = array('slides'=>$slides,'Headslides'=>$Headslides);

		return view('fe.home')->with('data',$data);
	}
    public function create()
    {
    	return view('fe.registration');
    }
    public function gallery()
    {
        return view('fe.gallery');
    }
    public function contact()
    {
        return view('fe.contact');
    }
    public function about(){
       return view('fe.about');
    }
    public function add_registration()
    {
    	return view('be.add_registration');
    }
    /*
     *addMessage
     */
   //addMessage
    public function addMessage(){
        $Message = Message::find(1);
        return view('be.add_message')->with('Message',$Message);
    }
    /*
     *addSlides/ Narayana
     */
    public function addSlides(){
        
          $slides = DB::table('slides')->select('id','path')->where('type','1')->get();
          $Headslides = DB::table('slides')->select('id','path')->where('type','2')->get();
          $data = array('slides'=>$slides,'Headslides'=>$Headslides);
        return view('be.add_slides')->with('data',$data);
    }
    public function edit_registration($id)
    {
        $visitor = Visitor::find($id);  
        return view('be.edit_registration', compact('visitor'));
    }
   
    public function update_registration(Request $request, $id)
    {
        
        $visitor = Visitor::find($id);
        $validator = $this->validator($request->all());

    	if ($validator->fails()) {
    		$this->throwValidationException(
    			$request, $validator
    		);
    	}
    	
 $darshan = $request->input('darshan_type');
            if($darshan=="VIP BREAK")
              $subdarshan = 1;
            elseif($darshan=="SPECIAL DARSHNAM")
              $subdarshan = 2;
            elseif($darshan=="ACCOMIDATION")
              $subdarshan = 3;
            elseif($darshan=="ARJITHA SEAVAS")
              $subdarshan = 4;
          $subdarshan_type_id = $request->input('subdarshan_type_id');
        if( $subdarshan_type_id==""){ $subdarshan_type_id = 0; }

    	$darshan_date = date('Y-m-d H:i:s', strtotime($request->darshan_date));
    	$accom_date = date('Y-m-d H:i:s', strtotime($request->accom_date));
    	$visitor->name = $request->name;
    	$visitor->mobile = $request->mobile;
        $visitor->total_members = $request->total_members;
        $visitor->darshan_type = $request->darshan_type;
        $visitor->darshan_date = $darshan_date;
        $visitor->accom_date = $accom_date;
        $visitor->reference = $request->reference;
        $visitor->ref_name = $request->ref_name;
        $visitor->remarks = $request->remarks;
        $visitor->darshan_type_id = $subdarshan;
        $visitor->subdarshan_type_id = $subdarshan_type_id;

        $visitor->save();
       // return redirect()->route('visitor', [$visitor->status]);

       return redirect()->route('visitor.status',[$visitor->status])->withSuccess('Visitor updated successfully');

    

    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        
           return Validator::make($data, [
            'name' => 'required',
            'mobile' => 'required',
            'total_members' => 'required',
            'darshan_date' => 'required',
            'darshan_type' => 'required',
            'accom_date'=> 'required',
            'reference' => 'required',
            'ref_name' => 'required'
        ]); 
        
        
    }
   
    public  function send_sms($mobile, $message)
    {
        // http://bhashsms.com/api/sendmsg.php?user=amaraa&pass=amaraa1234&sender=amaraa&phone=9908372997&text=Test%20SMS&priority=ndnd&stype=normal
    	// Message details
    	$numbers = urlencode($mobile);
    	$sender = urlencode('amaraa');
    	$message = rawurlencode($message);
    	$username = 'amaraa';
    	$password = 'amaraa1234';
     
    	// Prepare data for POST request
    	$data = 'user='.$username.'&pass='.$password.'&sender='.$sender.'&phone='.$numbers.'&text='.$message.'&priority=ndnd&stype=normal';
     
    	// Send the GET request with cURL
    	$ch = curl_init('http://bhashsms.com/api/sendmsg.php?' . $data);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$response = curl_exec($ch);
    	curl_close($ch);
    	
    	// Process your response here
    	return $response;
     
    }
    /*visitor.storereferal*/
      public function storerefer(Request $request)
    {  
        
         if($request->input('url')){ 
              $url = $request->input('url'); 
              $data = url::where('url',$url)->update(['status' => 1]);
           }
            /*
            *Generate random string
            */
             $darshan = $request->input('darshan_type');
            if($darshan=="VIP BREAK")
              $subdarshan = 1;
            elseif($darshan=="SPECIAL DARSHNAM")
              $subdarshan = 2;
            elseif($darshan=="ACCOMIDATION")
              $subdarshan = 3;
            elseif($darshan=="SPECIAL SEAVAS")
              $subdarshan = 4;
            if($request->input('subdarshan_type_id')==""){ $request['subdarshan_type_id'] = 0; }
        
            $request['darshan_type_id'] =   $subdarshan;
			      $request['constituency'] = "";
          
           $randomString = $this->randomString(5); 
           if($randomString=="")$randomString = $this->randomString(5);
           $visitor = DB::table('visitors')->where('uid',$randomString)->get();
            if(count($visitor)>0){ $randomString = $this->randomString(5); }
           
    	// dd($request->all());
    	$validator = $this->validator($request->all());

    	if ($validator->fails()) {
    		$this->throwValidationException(
    			$request, $validator
    		);
    	}
    	$request['uid'] = $randomString;
    	$request['darshan_date'] = date('Y-m-d H:i:s', strtotime($request->darshan_date));
    	$request['accom_date'] = date('Y-m-d H:i:s', strtotime($request->accom_date));
    	// dd($request->all());
    	$visitor = Visitor::create($request->all());
      $id = $visitor->id; 
    	$accom_date = date('d-m-Y', strtotime($request->accom_date));
       $Message = Message::find(1);
        $Msg     = explode('-',$Message->message);
        $message =  $Msg[0].' '.$visitor->name.' '.$Msg[1].' '.date('d-m-Y', strtotime($accom_date)).' '.$Msg[2]; 
        $message = explode(',',$message);
        $message = $message[0].'(#TID:'.$visitor->uid.'),'.$message[1].','.$message[2].','.$message[3]; 
       
    	$this->send_sms($request->mobile, $message);
     
    	     return redirect()->back()->withSuccess('Visitor created successfully');

    }
    
    /*visitor.store*/
    public function store(Request $request)
    {
        
         if($request->input('url')){ 
              $url = $request->input('url'); 
              $data = url::where('url',$url)->update(['status' => 1]);
           }
            /*
            *Generate random string
            */
             $darshan = $request->input('darshan_type');
            if($darshan=="VIP BREAK")
              $subdarshan = 1;
            elseif($darshan=="SPECIAL DARSHNAM")
              $subdarshan = 2;
            elseif($darshan=="ACCOMIDATION")
              $subdarshan = 3;
            elseif($darshan=="ARJITHA SEAVAS")
              $subdarshan = 4;
            if($request->input('subdarshan_type_id')==""){ $request['subdarshan_type_id'] = 0; }
        
            $request['darshan_type_id'] =   $subdarshan;
           
           $randomString = $this->randomString(5); 
           $visitor = DB::table('visitors')->where('uid',$randomString)->get();
            if(count($visitor)>0){ $randomString = $this->randomString(5); }
           if($randomString=="")$randomString = $this->randomString(5);
    	// dd($request->all());
    	$validator = $this->validator($request->all());

    	if ($validator->fails()) {
    		$this->throwValidationException(
    			$request, $validator
    		);
    	}
    	$request['uid'] = $randomString;
    	$request['darshan_date'] = date('Y-m-d H:i:s', strtotime($request->darshan_date));
    	$request['accom_date'] = date('Y-m-d H:i:s', strtotime($request->accom_date));
    	$request['constituency'] ="";
    	if(Auth::user()->user_type==1 || Auth::user()->user_type==2)
              $request['constituency'] = Auth::user()->constituency;
    	// dd($request->all());
    	$visitor = Visitor::create($request->all());
    	$id = $visitor->id; 
    	$accom_date = date('d-m-Y', strtotime($request->accom_date));
        // $Message = Message::find(1);
        // $Msg     = explode('-',$Message->message);
    	//$message = $Msg[0].' '.$visitor->name.' '.$Msg[1].' '.$accom_date.' '.$Msg[2];
	    /*$message = 'శ్రీమతి/శ్రీ   '.$visitor->name.' గారు ,
    	మీరు స్వామి వారి దర్శనము కొరకు చేసుకొనిన Registration పూర్తి అయినది . తదుపరి సమాచారము కొరకు వేచిఉండగలరు .
        ..నమో వెంకటేశాయ @చైర్మన్ ఆఫీస్ , టీటీడీ';*/
        
         $Message = Message::find(1);
        $Msg     = explode('-',$Message->message);
        $message =  $Msg[0].' '.$visitor->name.' '.$Msg[1].'(#TID:'.$visitor->uid.')'.date('d-m-Y', strtotime($accom_date)).' '.$Msg[2]; 
        $message = explode(',',$message);
        $message = $message[0].','.$message[1].','.$message[2].','.$message[3].','.$message[4];
       // echo $message; die;
    	$this->send_sms($request->mobile, $message);
    	
if(Auth::user()->user_type==1 ||Auth::user()->user_type==2){
         
          $darshan_date = date('Y-m-d', strtotime($request->darshan_date));
          $accom_date = date('Y-m-d', strtotime($request->accom_date));
          $data = array( 'darshan_type'=>$request->darshan_type,
                         'darshan_date'=>date('dS F Y', strtotime($darshan_date)),
                         'accom_date'=>date('dS F Y', strtotime($accom_date)),
                         'total_members'=>$request->total_members,
                         'name'=>$request->name,
                         'email'=>Auth::user()->email,
                         'mobile'=>Auth::user()->mobile,
                         'constituency'=>Auth::user()->constituency,
                         'user_type'=>Auth::user()->user_type,
                         'address'=>Auth::user()->address,
                         'uid'=>$randomString,
                         'id'=>$id
                         );
         // echo"<pre>"; print_r($data);die;
          $request->session()->forget('printData');
          $request->session()->push('printData',$data);
          $url = trim(url('/print_ref'));  
          echo "<script>window.open('".$url."', '_blank')</script>";
          return view('fe.calender')->withSuccess('Registration successfully');
          //end
      }else{
    	     return redirect()->back()->withSuccess('Visitor created successfully');
      }

    }

    public function visitorContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'message' => 'required',
        ]);

        $contact = Contact::create($request->all());
        if($contact)
        {
            return redirect()->back()->withSuccess('Thanks for contacting us');
        }else
        {
            return redirect()->back()->withError('Sorry we have some issue');
        }

    }

    public function getVistorByStatus($status)
    {
        $from_date = !empty($_REQUEST['from_date'])?date('Y-m-d', strtotime($_REQUEST['from_date'])):date('Y-m-d');
        $to_date = !empty($_REQUEST['to_date'])?date('Y-m-d', strtotime($_REQUEST['to_date'])):date('Y-m-d',strtotime('+ 1 month'));
        if($status == 'all')
        {
            
             if(Auth::user()->user_type == 2 || Auth::user()->user_type == 1){
                 $visitors = DB::table('visitors')
              ->where('accom_date', '>=', $from_date)
               ->where('accom_date', '<=', $to_date)
               ->where('ref_name',Auth::user()->name)
               ->where('constituency','=',Auth::user()->constituency)
              ->orderBy('accom_date','asc')
              ->get();

           }elseif(Auth::user()->user_type==3){
               
                $visitors = DB::table('visitors')
              ->where('accom_date', '>=', $from_date)
               ->where('accom_date', '<=', $to_date)
               ->where('constituency','!=','')
              ->orderBy('accom_date','asc')
              ->get();
               
           }else{
           // $visitors = Visitor::orderBy('id','desc')->get();
             $visitors = DB::table('visitors')
              ->where('accom_date', '>=', $from_date)
               ->where('accom_date', '<=', $to_date)
               ->where('constituency','=','')
              ->orderBy('accom_date','asc')
              ->get();
           }
        }else
        {
             if(Auth::user()->user_type == 2  || Auth::user()->user_type == 1){

            $visitors = DB::table('visitors')
              ->where('status', $status)
              ->where('accom_date', '>=', $from_date)
               ->where('accom_date', '<=', $to_date)
               ->where('ref_name',Auth::user()->name)
               ->where('constituency','=',Auth::user()->constituency)
              ->orderBy('accom_date','asc')
              ->get();
              
          }elseif(Auth::user()->user_type==3){
              
              $visitors = DB::table('visitors')
              ->where('status', $status)
              ->where('accom_date', '>=', $from_date)
               ->where('accom_date', '<=', $to_date)
               ->where('constituency','!=','')
              ->orderBy('accom_date','asc')
              ->get();
              
          }else{
              
            //$visitors = Visitor::where('status',$status)->get(); 
            $visitors = DB::table('visitors')
              ->where('status', $status)
              ->where('accom_date', '>=', $from_date)
               ->where('accom_date', '<=', $to_date)
               ->where('constituency','=','')
              ->orderBy('accom_date','asc')
              ->get();
          }
        }

        return view('be.visitors', compact('visitors','status','from_date','to_date'));
    }
    
     public  static function statusUp($id,$status,$remarks=""){
         $obj = new VisitorController();
         $obj->statusUpdate($id, $status, $remarks);

    }

    public function statusUpdate($id, $status, $remarks='')
    {
        
       $visitor = Visitor::find($id);
       $visitor->update(['status'=>$status, 'remarks'=>$remarks]);
       if($status == 'confirm')
       {
          $visitor->update(['staffstatus'=>'pending']); 
       }
        if($status =='aprove'){
        /* $message ='శ్రీమతి/శ్రీ  '.$visitor->name.' గారు ,
మీ అభ్యర్ధన  స్వీకరించటమయినది . మీరు స్వర్ణ తిరుమల గెస్ట్ హౌస్ నందు గల చైర్మన్ గారి ఆఫీసు లో   '.date('d-m-Y', strtotime($visitor->accom_date)).'  ఉదయం 10  గంటలకు సంప్రదించగలరు.

..నమో వెంకటేశాయ @చైర్మన్ ఆఫీస్ , టీటీడీ';*/

/*$Msg     = explode('-',$Message->message);
        $message =  $Msg[0].' '.$visitor->name.' '.$Msg[1].'(#TID:'.$visitor->uid.')'.date('d-m-Y', strtotime($accom_date)).' '.$Msg[2]; 
        $message = explode(',',$message);
        $message = $message[0].','.$message[1].','.$message[2].','.$message[3].','.$message[4];*/
        $Message = Message::find(1);
        $Msg     = explode('-',$Message->message);
        $message =  $Msg[0].' '.$visitor->name.' '.$Msg[1].'(#TID:'.$visitor->uid.')'.date('d-m-Y', strtotime($visitor->accom_date)).' '.$Msg[2]; 
        $message = explode(',',$message);
        $message = $message[0].','.$message[1].','.$message[2].','.$message[3].','.$message[4];  
        $this->send_sms($visitor->mobile, $message);
        }else if ($status =='reject'){
            $message ='శ్రీమతి/శ్రీ  '.$visitor->name.' గారు ,
                మీరు కోరుకున్న రోజున అవకాశము లేనందు వలన మీ అభ్యర్ధనను స్వీకరించలేక పోతున్నాము . 
                ..నమో వెంకటేశాయ @చైర్మన్ ఆఫీస్ , టీటీడీ';
            $this->send_sms($visitor->mobile, $message);
        }
       return redirect()->back()->withSuccess('status changed successfully'); 
    }
    
    public function getVistorBystaffStatus($status)
    {
       
       // $visitors = Visitor::where('status',$status)->get();
       $from_date = !empty($_REQUEST['from_date'])?date('Y-m-d', strtotime($_REQUEST['from_date'])):date('Y-m-d');
        $to_date = !empty($_REQUEST['to_date'])?date('Y-m-d', strtotime($_REQUEST['to_date'])):date('Y-m-d',strtotime('+ 1 month'));
       if(Auth::user()->user_type == 2 || Auth::user()->user_type == 1){
           
           $visitors = DB::table('visitors')
                ->where('status', $status)
                ->where('ref_name',Auth::user()->name)
                 ->where('accom_date', '>=', $from_date)
               ->where('accom_date', '<=', $to_date)
               ->orderBy('name','asc')
              ->get();
       }else{
         $visitors = DB::table('visitors')
                ->where('status', $status)
                 ->where('accom_date', '>=', $from_date)
               ->where('accom_date', '<=', $to_date)
               ->orderBy('name','asc')
              ->get();
              
       }
        return view('be.staffvisitors', compact('visitors','status','from_date','to_date'));
    }
    public function staffstatusUpdate($id, $status)
    {
        // dd($id);
        $visitor = Visitor::find($id);
        $visitor->update(['status'=>$status]);
      // return redirect()->route('visitor.staffstatus',$status)->withSuccess('status changed successfully'); 
      return redirect()->back()->withSuccess('status changed successfully'); 
    }

    /*
      add Message
    */
      public function storeMessage(Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
        ]);
        $visitor = Message::find(1);
        $visitor->message = $request->message;
        $message = $visitor->save();
        if($message)
        {
            return redirect()->back()->withSuccess('Message saved successfully');
        }else
        {
            return redirect()->back()->withError('Message save Failed');
        }

    }
    /*
      add Message 
      Narayana
    */
      public function storeSlides(Request $request)
    {
         // then put that name to $photoName variable.
        $photoName = time().'.'.$request->user_photo->getClientOriginalExtension();
        $request->user_photo->move(public_path('slides'), $photoName);
        $slides = new Slides();
        $slides->path = $photoName;
        $slides->type = $request->type;
        $slides->createdBy = 1;
        $slides = $slides->save();
        if($slides)
        {
            return redirect()->back()->withSuccess('slide saved successfully');
        }else
        {
            return redirect()->back()->withError('slide save Failed');
        }

    }    
    /*
     *Referal
     */
    public function shareUrl(request $request){
      $this->validate($request, [
            'url' => 'required',
        ]);
        $mobile = $request->input('mobile'); 
        $url    = $request->input('url');
        //send sms
        $message = 'తిరుమల దర్శనం కొరకు ఈ '.$url.' క్లిక్ చేసి ,  ఫార్మ్ పూరించగలరు .'; 
        $message_status = $this->send_sms($request->mobile, $message); 
        //if(empty($message_status)){  echo "failed"; die;}else{echo $message_status;}   die;
        $url = new Url();
        $url->url = $request->input('url');
        $url->status = 0;
        $userdata = User::find(Auth::id());
        $url->userid = $userdata->id;
        $saveUrl = $url->save(); 
        if($saveUrl)
        {
            return redirect()->back()->withSuccess('Refere url successfully');
        }else
        {
            return redirect()->back()->withError('Refer url Failed');
        }

       
    }
    /*
     *shareletter
     */
    public function shareletter(request $request){
      $this->validate($request, [
            'url' => 'required',
        ]);
        $mobile = $request->input('mobile'); 
        $url    = $request->input('url');
        //send sms
        $message = 'తిరుమలలో మీరు ఇవ్వవలసిన లెటర్ కోసం క్లిక్ చేయండి '.$url; 
        $message_status = $this->send_sms($request->mobile, $message); 
        //if(empty($message_status)){  echo "failed"; die;}else{echo $message_status;}   die;
        $url = new Url();
        $url->url = $request->input('url');
        $url->status = 0;
        $userdata = User::find(Auth::id());
        $url->userid = $userdata->id;
        $saveUrl = $url->save(); 
        if($saveUrl)
        {
            return redirect()->back()->withSuccess('Refere url successfully');
        }else
        {
            return redirect()->back()->withError('Refer url Failed');
        }

    }
    /*
     *Generate Random String
     */
     function randomString($size){ 
        //$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i <$size; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
      return $randomString;
   } 
   /*
    *visitor Controller for analytics
    */
   function stastics(){

    $visitorCateg = DB::table('visitors')
                    ->select('darshan_type',DB::raw('count(*) as count'),DB::raw('SUM(total_members) AS total'))
                    ->whereIN('darshan_type_id',[1,2,3,4])
                    ->where('accom_date',date('Y-m-d'))
                    ->groupBy('darshan_type')
                    ->get();
   //select status,count(id) from `visitors` where `accom_date` = '2019-09-14' and `status` in ('pending','aprove') group by status
    $visitorAttan = DB::table('visitors')
                ->select('status',DB::raw('count(*) as count'))
                ->whereIN('status',['pending','aprove'])
                ->where('accom_date', date('Y-m-d'))
                ->groupBy('status')->get();
    
      //echo"<pre>"; print_r($visitorCateg);die;
      return view('be.statics',compact('visitorCateg','visitorAttan'));
   }
   /*
     *print doc
     */
    public function print_ref(){
      return view('be.print_ref');
    }
   /*
 *delete slide
 */
public function dimage(Request $request){
   $id = $request->id;
   $name = $request->name;
   
   $file_path = public_path().'/slides/'.$name;
   unlink($file_path);
   $res = Slides::where('id',$id)->delete();
   if($res)
    echo '1';
  else
    echo'0';

}
/*
 *delete responses
 */
public function dresponse(Request $request){
   $id = $request->id;
   $res = Responses::where('id',$id)->delete();
   if($res)
    echo '1';
  else
    echo'0';

}
/*
 *print letter head
 */
public function printletterHead($id){

$id = request()->segment(2);
 $visitor = Visitor::find($id); 
$data = DB::table('visitors')
            ->join('users', 'visitors.ref_name', '=', 'users.name')
            ->select('visitors.*','users.name as mname','users.user_type as mtype','users.mobile as mmobile','users.constituency as mconstituency','users.email as memail','users.address as maddress','users.status as mstatus')
            ->where('visitors.uid',$id)
            ->get();  
         return view('be.printHead')->with('data',$data);
         // echo"<pre>"; print_r($data);die;
}
}
