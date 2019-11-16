<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Visitor;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
       // $visitors = Visitor::where('status','pending')->get(); 
        $from_date = !empty($_REQUEST['from_date'])?date('Y-m-d', strtotime($_REQUEST['from_date'])):date('Y-m-d');
        $to_date = !empty($_REQUEST['to_date'])?date('Y-m-d', strtotime($_REQUEST['to_date'])):date('Y-m-d',strtotime('+ 1 month'));
        if(isset(Auth::user()->user_type) && Auth::user()->user_type == 'staff'){
             $visitors = DB::table('visitors')
                ->where('status', 'aprove')
              ->where('accom_date', date('Y-m-d'))
              ->orderBy('name','asc')
              ->get();
            $title ='Approved List';
         }elseif(Auth::user()->user_type == 2 || Auth::user()->user_type == 1){

                 $visitors = DB::table('visitors')
                ->where('status', 'aprove')
                 ->where('accom_date', '>=', $from_date)
               ->where('accom_date', '<=', $to_date)
                ->where('ref_name',Auth::user()->name)
                ->where('constituency','=',Auth::user()->constituency)
              ->orderBy('name','asc')
              ->get();
            $title ='Approved List';

         }elseif(Auth::user()->user_type == 3){
                  
                 $to_date = !empty($_REQUEST['to_date'])?date('Y-m-d', strtotime($_REQUEST['to_date'])):date('Y-m-d',strtotime('+ 1 day'));
		                $date = date('Y-m-d');
					$visitors = DB::select(DB::raw('select v.*,u.constituency as cons 
					                                from visitors v 
					                                inner join users u ON v.ref_name =u.name 
					                                where v.status="pending" and v.constituency!="" and v.darshan_date="'.$date.'" order by v.accom_date asc'));
                                                   echo'select v.*,u.constituency as cons 
					                                from visitors v 
					                                inner join users u ON v.ref_name =u.name 
					                                where v.status="pending" and v.darshan_date="'.$date.'" order
					                                by v.accom_date asc'; 	
					 
                 $title ='Approved List';
                 $mla = DB::select( DB::raw("SELECT distinct  reference , ref_name 
                                                        FROM `visitors`
                                                        where constituency !='' and status='pending'
                                                        and darshan_date =' $date'"));
                                                        // WHERE ref_name in(select name from users where user_type=1 or user_type=2) 
                                                      /* echo"SELECT distinct  reference , ref_name 
                                                        FROM `visitors`
                                                        where constituency !=''
                                                        and darshan_date =' $date'";*/
                                                      /*SELECT distinct  reference , ref_name 
                                                        FROM `visitors`
                                                        WHERE (REFERENCE  like'%MLA%' or  REFERENCE like'%MP%') 
                                                        and darshan_date='2019-09-19' */ 

         }else{
         $visitors = DB::table('visitors')
                ->where('status', 'pending')
              ->where('accom_date', '>=', $from_date)
               ->where('accom_date', '<=', $to_date)
              ->where('constituency','=','')
              ->orderBy('accom_date','asc')
              ->get();
        $title ='Pending List';
    }
          if(Auth::user()->user_type==1 ||Auth::user()->user_type==2){
            return view('mla', compact('visitors','title','from_date','to_date','mla'));
           }elseif(Auth::user()->user_type=="admin"){
            return view('admin',compact('visitors','title','from_date','to_date','mla'));
           }else{
            return view('home', compact('visitors','title','from_date','to_date','mla'));
         }
         
    }
    
    /*
    *
    *home list
    */
   public function homelist(){
        $from_date = !empty($_REQUEST['from_date'])?date('Y-m-d', strtotime($_REQUEST['from_date'])):date('Y-m-d');
        $to_date = !empty($_REQUEST['to_date'])?date('Y-m-d', strtotime($_REQUEST['to_date'])):date('Y-m-d',strtotime('+ 1 month'));
      $mla = "";
        if(isset(Auth::user()->user_type) && Auth::user()->user_type == 'staff'){
             $visitors = DB::table('visitors')
                ->where('status', 'aprove')
              ->where('accom_date', date('Y-m-d'))
              ->orderBy('name','asc')
              ->get();
            $title ='Approved List';
         }elseif(Auth::user()->user_type == 2 || Auth::user()->user_type == 1){

                 $visitors = DB::table('visitors')
                ->where('status', 'pending')
                 ->where('accom_date', '>=', $from_date)
                 ->where('accom_date', '<=', $to_date)
                ->where('ref_name',Auth::user()->name)
                ->where('constituency','=',Auth::user()->constituency)
              ->orderBy('name','asc')
              ->get();
            $title ='Approved List';

         }elseif(Auth::user()->user_type == 3){  
            $to_date = !empty($_REQUEST['to_date'])?date('Y-m-d', strtotime($_REQUEST['to_date'])):date('Y-m-d',strtotime('+ 1 day'));
            $users = (array)DB::select(DB::raw("select name from users where user_type=1 or user_type=2"));
            $users_list = array();
              foreach($users as $user){ $users_list[] = $user->name;}
                 $date = date('Y-m-d');
                  $visitors = DB::select(DB::raw('select v.*,u.constituency 
                                                  from visitors v 
                                                  inner join users u ON v.ref_name =u.name 
                                                  where v.status="pending" and v.darshan_date="'.$date.'" order by v.accom_date asc'));
                  
                 $title ='Approved List';
                 $mla = $results = DB::select( DB::raw("SELECT distinct  reference , ref_name 
                            FROM `visitors`
                            WHERE ref_name in(select name from users where user_type=1 or user_type=2) 
                            and darshan_date = CURDATE() "));
         }else{  
         $visitors = DB::table('visitors')
                ->where('status', 'pending')
              ->where('accom_date', '>=', $from_date)
               ->where('accom_date', '<=', $to_date)
               ->where('constituency','=','')
              ->orderBy('accom_date','asc')
              ->get();
        $title ='Pending List';
    }
        return view('home', compact('visitors','title','from_date','to_date','mla'));
    }    
}
