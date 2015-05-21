<?php
Event::listen('illuminate.query', function($i)
{
	//var_dump(func_get_args());
	//echo $i .'<br>';
});



Route::post('mv/project', function()
{

	//$ftp = new \App\Credentials();
	//$ftp->set('')

	return \Illuminate\Support\Facades\Response::json(['success']);

});


Route::get('', 'ProjectController@index');
Route::get('project', 'ProjectController@index');
Route::get('project/{id}', 'ProjectController@edit');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::any('{page}', 'HomeController@handle')->where('page', '(.*)');






/*


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');


*/