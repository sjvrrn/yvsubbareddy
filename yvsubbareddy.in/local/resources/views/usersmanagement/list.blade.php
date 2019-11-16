@extends('layouts.app')

@section('content')
<div class="content">
    @if(Session::has('success'))

<?

?>    
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                                @elseif( Session::has( 'warning' ))
                                <div class="alert alert-danger">
                                    {{ Session::get( 'warning' ) }}
                                </div>
                                @endif
                    <div class="govt-section" ng-show="govtShow">
                            <div class="row">
                                <div class="col-md-9 col-xs-12 col-sm-12 mt-2">
                                <h3>MP/MLA's</h3> 
                                </div>
                               <!--  <div class="col-md-3 col-xs-12 col-sm-12 mt-2">
                                    <div style="float:right;font-weight:bold;font-size:20px;"><a href="{{ url('users/create')}}">Add New</a></div>
                                </div> -->
                                <div class="col-md-12 col-xs-12 col-sm-12 mt-2">
    	    			        <table id="example" class="display table-responsive" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>user_type</th>
                                            <th>Status</th>      
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                               
           
                                    @if(!empty($users))
                                    @foreach($users as $i=>$user)
                                     <tr>
                                         <td>{{$i+1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}} </td>
                                        <td>@if($user->user_type==1) MLA @else MP @endif</td>
                                        <td>@if($user->status==1)Active @else Inactive @endif</td>
                                        <td>
                                        <a href="{{ url('list/edit/' . $user->id)}}" style="margin-right:10px;" ><i class="fas fa-edit" ></i></a>
                                        <a href="{{ url('/userdelete/' . $user->id) }}"  id="delete"><i class="fa fa-trash" ></i></a>
                                        </td>    
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                               
                                </table>
                                </div>
                            </div>
                        </div>
                </div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"aaSorting": [[ 1, 'asc' ]],
			"iDisplayLength": 100

		});
		/*
		 *delete user
		 */
		  $(document).on("click","#delete",function(){
        if (confirm("You want to delete this user?") == true) {
                return true; 
              } else { 
                return false;
              }
    });
} );

</script>                
@endsection
