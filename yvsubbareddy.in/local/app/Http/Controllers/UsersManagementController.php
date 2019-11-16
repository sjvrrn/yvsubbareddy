<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Visitor;
use App\Contact;
use App\User;
use App\Responses;
use DB;
use Auth;
use Hash;
use Carbon\Carbon;
use App\Url;

class UsersManagementController extends Controller
{
    
    
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
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password',
        ]); 
        
        
    }
   
    
    public function create()
    {
    	return view('usersmanagement.create-user');
    }
    
    public function addUser()
    {
        return view('usersmanagement.add-user');
    }
    public function store(Request $request)
    {
    	$validator = $this->validator($request->all());
    	if ($validator->fails()) {
    		$this->throwValidationException(
    			$request, $validator
    		);
    	}
    	$request['password'] = bcrypt($request->password);
    	$request['user_type'] = 'staff';$request['constituency'] = 0;
          $request['mobile'] = "0"; 
          $request['address'] = "test";
          $request['updated_at'] = date('Y-m-d h:i:s');
          $request['created_at'] = date('Y-m-d h:i:s');
    	$user = User::create($request->all());
    	return redirect()->route('user.index')->withSuccess('Office staff created successfully');
    }

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = DB::table('users')
              ->where('user_type', 'staff')
              ->orderBy('name','asc')
              ->get();
        return view('usersmanagement.show-users', compact('users'));
    }
   
    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $users = DB::table('users')
              ->where('id', $id)
              ->get();
        return view('usersmanagement.show-user', compact('users'));
    }

    public function profile(){
        $user = Auth::user();
        return view('usersmanagement.update-profile', compact('user'));
    }
 
    public function profile_update(Request $request)
    { 
        $user = User::find(Auth::user()->id);
        if(Auth::user()->email == $request->input('email') ) {
           
            $rules['name'] = 'required';
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $user->name = $request->input('name');
            $user->save();
            return redirect()->back()->withSuccess('Profile updaed  successfully');

        }
        else{
            
            $rules['name'] = 'required';
            $rules['email'] = 'required|email|unique:users';
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
            return redirect()->back()->withSuccess('Profile updaed  successfully');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $responses =  DB::table('responses')
              ->where('userid', $id)
              ->orderBy('id')
              ->get();
        return view('usersmanagement.edit-user', compact('user'))->with('responses',$responses);
    }
    /*
     *Delete user
     */
    public function delete($id){

        $status = DB::table('visitors')->where('id', '=', $id)->delete();
        if($status)
        return redirect()->back()->withSuccess('visitor Deleted successfully');
      else
        return redirect()->back()->withSuccess('visitor Delete  Failed');
    }
    //25/09/2019
    /*
     *Referal
     */
    public function referUrl(){
    
    $current_timestamp = Carbon::now()->timestamp;
      $url = url("/user/referal/".$current_timestamp);
       return view('be.refer')->with('url',$url);
    } 
    /*
     *Referal
     */
    public function referal(){
        $url = url()->current(); 
    $data = url::where(array('url'=>$url,'status'=>'0'))->get();
    $size = count($data);
    if($size>0) $status = 1; else $status = 0;
       return view('fe.referal')->with('status',$status);
    } 
    /*
     *Referal
     */
    public function shareUrl(request $request){
      $this->validate($request, [
            'url' => 'required',
        ]);
        $url = new Url();
        $url->url = $request->input('url');
        $url->status = 0;
        $userdata = User::find(Auth::id());
        $url->userid = $userdata->id;
        $saveUrl = $url->save(); 
        if($saveUrl)
        {
            return redirect()->back()->withSuccess('Url saved successfully');
        }else
        {
            return redirect()->back()->withError('Url save Failed');
        }

       
    } 
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $user = User::find($id);
        $emailCheck = ($request->input('email') != '') && ($request->input('email') != $user->email);
        $passwordCheck = $request->input('password') != null;
        $rules = [
            'name' => 'required',
        ];
        if ($emailCheck) {
            $rules['email'] = 'required|email|unique:users';
        }
        if ($passwordCheck) {
            $rules['password'] = 'required|confirmed';
            $rules['password_confirmation'] = 'required|same:password';
        }
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user->name = $request->input('name');
        if ($emailCheck) {
            $user->email = $request->input('email');
        }
        if ($passwordCheck) {
            $user->password = bcrypt($request->input('password'));
        }
        /*responses 
         *save
         */
        if(!$request->user_type){

        $data['userid'] = $id;
        $data['response_id'] = $request->input('response'); 
        $data['created_At'] = date('Y-m-d h:i:s');
        $response = DB::table('responses')->insert($data);

        }else{
          if($request->user_type==1)$type='MLA';else $type='MP';
          $user->address = $request->address;
          $user->user_type = $request->user_type;
          $user->name = $request->name;
          $user->email = $request->email;
          $user->constituency = $request->constituency;
          
        }

         /*
          *user udpate
          */
          
        $user->status = $request->input('status');
        $user->save();
    	if(!$request->user_type)
    	        return redirect()->route('user.index')->withSuccess('Office staff updated successfully');
    else
            return redirect()->route('user.list')->withSuccess($type.' Updated successfully');

    }
    
    public function change_password()
    {
        return view('usersmanagement.change-password');
    }
    public function change_password_post(Request $request)
    {
        $request_data = $request->All();
         $validator = Validator::make($request->All(), [
                        'current-password' => 'required',
                        'password' => 'required|same:password',
                        'password_confirmation' => 'required|same:password',     
                      ]);
        if($validator->fails())
        {
        return back()->withErrors($validator)->withInput();
        }
        else
        {  
            $current_password = Auth::User()->password;     

            //if(bcrypt($request->input('current-password'))== $current_password)
            if ((Hash::check($request->input('current-password'), Auth::user()->password))) 

            {           
                $user_id = Auth::User()->id;                       
                $obj_user = User::find($user_id);
                $obj_user->password = bcrypt($request_data['password']);
                $obj_user->save(); 
            	return redirect()->back()->withSuccess('Pasword changed successfully');
            }
            else
            {           
               // exit('else');
               return back()->withWarning('Please enter correct current password')->withInput();
            }
        }        
       
    }
    /*printUser
     *Narayana(26/09/2019)
     */
    public function printUser($id){
                            $visitor = DB::table('visitors')
                                                      ->where('id','=', $id)
                                                      ->get();
                            $visitor = $visitor[0] ;
                            return view('be.print_ref')->with('visitor',$visitor);

    }
 /*
    *addUser
    *Narayana
    */
     public function guestuser(request $request){ 
      $validator = $this->validator($request->all());
      if ($validator->fails()) {
        $this->throwValidationException(
          $request, $validator
        );
      }
      $request['password'] = bcrypt($request->password);
      $request['user_type'] = $request->user_type;
      $user = User::create($request->all());
     // return redirect()->route('user.index')->withSuccess('Office staff created successfully');
        if($user)
        {
            return redirect()->back()->withSuccess('User Created successfully.');
        }else
        {
            return redirect()->back()->withError('User Creation Failed.');
        }

     }    
  /*
   *Calender
   */    
    public function calender(){
      $name  = Auth::user()->name;
      $year  = date('Y');
      $month = date('m');
      $date  = $year.'-'.$month; 
      $dates = DB::select("SELECT substr(accom_date,9,2) as date FROM `visitors` WHERE left(accom_date,7)='$date' and ref_name ='$name'");
     
      return view('fe.calender')->with('dates',$dates);
    }
 /*
   *monthly user's data
   */ 
  public function monthdata(Request $request){
    $month = $request->input('month');
    $year = $request->input('year');
     $name  = Auth::user()->name;
     if($month<10) $month = '0'.$month;
      $date  = $year.'-'.$month; 
      $dates = DB::select("SELECT substr(darshan_date,9,2) as date,total_members FROM `visitors` WHERE left(darshan_date,7)='$date' and ref_name ='$name'");
      $date = array();
      $days = array();
      if(count($dates)>0){
        foreach($dates as $da){ 
          $day = $da->total_members;
          $da = $da->date; 
          if($da<10)$da = substr($da,1,1);
             $date[] = $da; 
             $days[] = $day;
            }
      }
      $days = implode(',',$days);
      $arr = array('dates'=>$date,'days'=>$days);
      echo json_encode($arr); die;
     
  }
    /*
  *
  *userlist
  */  
  public function list(){
    $users = DB::table('users')
              ->where('user_type', '1')
              ->orwhere('user_type','2')
              ->orderBy('name','asc')
              ->get();
        return view('usersmanagement.list', compact('users'));
  }
  /*
   *user edit
   */
  public function list_edit($id)
    { 
        $user = User::find($id);
        $responses =  DB::table('responses')
              ->where('userid', $id)
              ->orderBy('id')
              ->get();
        return view('usersmanagement.list-edit', compact('user'))->with('responses',$responses);
    }
  /*
     *Delete user
     */
    public function userdelete($id){

        $status = DB::table('users')->where('id', '=', $id)->delete();
        if($status)
        return redirect()->back()->withSuccess('user Deleted successfully');
      else
        return redirect()->back()->withSuccess('user Delete  Failed');
    }  
}