<?php
date_default_timezone_set('Asia/Calcutta');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear', function() {
		$exitCode =  Artisan::call('cache:clear');
		 return "Cache is cleared";
	});
Route::get('/clear-cache', function() {
		$exitCode = Artisan::call('config:cache');
		return 'clear cache';
	});
	Route::get('/route-clear', function() {
		$exitCode = Artisan::call('route:clear');
		return 'route clear';
	});

	Route::get('/view-clear', function() {
		$exitCode = Artisan::call('view:clear');
		return 'view clear';
	});
	Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});
Route::post('/login', [
    'uses'          => 'Auth\AuthController@login',
    'middleware'    => 'checkstatus',
]);
Route::get('/', 'VisitorController@home')->name('visitor.home');
Route::get('/registration', 'VisitorController@create')->name('visitor.create');
Route::post('/registration', 'VisitorController@store')->name('visitor.store');
Route::post('/referregistrationregistration', 'VisitorController@storerefer')->name('visitor.storerefer');
Route::get('/gallery', 'VisitorController@gallery')->name('visitor.gallery');
Route::get('/contact', 'VisitorController@contact')->name('visitor.contact');
Route::get('/about', 'VisitorController@about')->name('visitor.about');
Route::post('/visitorcontact', 'VisitorController@visitorContact')->name('contact.store');
Route::post('/message', 'VisitorController@storeMessage')->name('visitor.message'); //Narayana
Route::post('/slides', 'VisitorController@storeSlides')->name('visitor.slides');     //Narayana



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@index')->name('admin');
Route::post('/home', 'HomeController@index')->name('home');
Route::post('/admin', 'HomeController@index')->name('admin');
Route::get('/visitor/{type}', 'VisitorController@getVistorByStatus')->name('visitor.status')->middleware('auth');
Route::post('/visitor/{type}', 'VisitorController@getVistorByStatus')->name('visitor.status')->middleware('auth');
Route::get('/visitorstatus/{id}/{type}/{remarks?}', 'VisitorController@statusUpdate')->name('visitor.updatestatus')->middleware('auth');
Route::get('/staff/{type}', 'VisitorController@getVistorBystaffStatus')->name('visitor.staffstatus')->middleware('auth');
Route::post('/staff/{type}', 'VisitorController@getVistorBystaffStatus')->name('visitor.staffstatus')->middleware('auth');
Route::get('/staffstatus/{id}/{type}', 'VisitorController@staffstatusUpdate')->name('visitor.staffupdatestatus')->middleware('auth');

Route::get('/users/index', 'UsersManagementController@index')->name('user.index')->middleware('auth');
Route::get('/users/edit/{id}', 'UsersManagementController@edit')->name('user.edit')->middleware('auth');
Route::post('/users/update/{id}', 'UsersManagementController@update')->name('user.update')->middleware('auth');
Route::get('/users/create', 'UsersManagementController@create')->name('user.create')->middleware('auth');
Route::post('/users/store', 'UsersManagementController@store')->name('user.store')->middleware('auth');

Route::get('/add_registration', 'VisitorController@add_registration')->name('add_registration');
//Route::post('/add_registration', 'VisitorController@store_visitor')->name('add_registration.store');
Route::get('/edit_registration/{id}', 'VisitorController@edit_registration')->name('edit_registration')->middleware('auth');
Route::post('/update_registration/{id}', 'VisitorController@update_registration')->name('edit_registration.update')->middleware('auth');

Route::get('/users/profile', 'UsersManagementController@profile')->name('user.profile')->middleware('auth');
Route::post('/users/profile_update', 'UsersManagementController@profile_update')->name('user.profile_update')->middleware('auth');

Route::get('/users/change_password', 'UsersManagementController@change_password')->name('user.change_password')->middleware('auth');
Route::post('/users/change_password_post', 'UsersManagementController@change_password_post')->name('user.change_password_post')->middleware('auth');
Route::get('/users/adduser', 'UsersManagementController@addUser')->name('users.adduser')->middleware('auth');


Route::get('/users/addmessage', 'VisitorController@addMessage')->name('users.addmessage')->middleware('auth');
Route::post('/Message', 'VisitorController@storeMessage')->name('visitor.addMessage'); //Narayana
Route::get('/users/addslides', 'VisitorController@addSlides')->name('users.addslides')->middleware('auth');//Narayana
Route::get('/visitordelete/{id}', 'UsersManagementController@delete')->name('user.delete')->middleware('auth');//Narayana(userdelete)
//25/09/2019
Route::get('/user/referurl', 'UsersManagementController@referUrl')->name('user.referurl')->middleware('auth');
Route::post('/shareUrl', 'VisitorController@shareUrl')->name('user.shareurl')->middleware('auth');
Route::post('/shareletter', 'VisitorController@shareletter')->name('user.shareletter')->middleware('auth');
Route::get('/user/referal/{id}', 'UsersManagementController@referal')->name('user.referal');
Route::post('/add_Referal', 'VisitorController@store')->name('visitor.referstore');//referstore
Route::get('/printuser/{id}', 'UsersManagementController@printUser')->name('user.printuser')->middleware('auth');
Route::get('/stastics', 'VisitorController@stastics')->name('visitor.stastics');
Route::post('/users/adduser', 'UsersManagementController@guestuser')->name('users.adduser')->middleware('auth');
Route::get('/calender', 'UsersManagementController@calender')->name('user.calender');
Route::post('/monthdata', 'UsersManagementController@monthdata')->name('user.monthdata');
Route::get('/uregister/{year}/{month}/{day}', 'VisitorController@add_registration')->name('uregister');
Route::get('/print_ref','VisitorController@print_ref')->name('visitor.print_ref');
Route::post('/dimage','VisitorController@dimage')->name('visitor.dimage');
Route::post('/dresponse','VisitorController@dresponse')->name('visitor.dresponse');
Route::get('/user/list','UsersManagementController@list')->name('user.list');
Route::get('/list/edit/{id}', 'UsersManagementController@list_edit')->name('user.list_edit')->middleware('auth');
Route::post('/list/edit/{id}', 'UsersManagementController@update')->name('user.list_edit')->middleware('auth');
Route::get('/userdelete/{id}', 'UsersManagementController@userdelete')->name('user.userdelete')->middleware('auth');
Route::get('/homelist', 'HomeController@homelist')->name('homelist')->middleware('auth');
Route::post('/homelist', 'HomeController@homelist')->name('homelist')->middleware('auth');
Route::get('/printletter/{id}','VisitorController@printletterHead');