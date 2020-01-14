<?php

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

Route::get('/','JobController@index');

//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
//jobs
Route::get('/','JobController@index');
Route::get('/jobs/applications','JobController@applicant')->name('applicant');
Route::get('/jobs/{id}/{job}','JobController@show')->name('jobs.show');
Route::get('/jobs/edit/{id}/{job}','JobController@edit')->name('jobs.edit');
Route::post('/jobs/edit/{id}/{job}','JobController@update')->name('jobs.update');
Route::get('jobs/create','JobController@create')->name('jobs.create');
Route::get('jobs/my-job','JobController@myjob')->name('my.jobs');
Route::post('jobs/create','JobController@store')->name('job.store');
Route::get('jobs/allJobs','JobController@all_jobs')->name('alljobs');

//Company

Route::get('/company/{id}/{company}','CompanyController@index')->name('company.index');
Route::get('/company/create','CompanyController@create')->name('company.view');
Route::post('/company/create','CompanyController@store')->name('company.store');
Route::post('/company/coverphoto','CompanyController@coverphoto')->name('cover.photo');
Route::post('/company/companylogo','CompanyController@companylogo')->name('company.logo');




//Profile User

Route::get('user/profile','UserProfileController@index');
Route::post('user/profile/create','UserProfileController@update')->name('profiles.create');
Route::post('user/coverletter','UserProfileController@coverletter')->name('cover.letter');
Route::post('user/resume','UserProfileController@resume')->name('resume');
Route::post('user/avatar','UserProfileController@avatar')->name('avatar');

//Employer

Route::view('employer/register','auth.employer-register')->name('employer.register');

Route::post('employer/register','EmployerController@EmployerRegister')->name('emp.register');

Route::post('application/{id}','JobController@apply')->name('apply');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





route::get('/vue',function (){
   return view('introduction');
});

//Save and Un Save Job

Route::post('/save/{id}','FavouriteController@savejob');
Route::post('/unsave/{id}','FavouriteController@unsavejob');

//Search
Route::get('/jobs/search','JobController@SearchJobs');
