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

//Main pages
Route::get('/','HomeController@index')->name('home');
Route::get('/jobs','UserController@index');

//Contact
Route::get('/contact','ContactController@index');
Route::post('/contact','ContactController@sendMessage');

Route::get('/test',function(){
    return view('admin.adminlayout');
});






Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});
Route::get('autocomplete', 'UserController@autocomplete')->name('autocomplete');

Auth::routes();

//Education

Route::post('/profile/education/store', 'EducationController@storeEducation')->name('addEducation');
Route::post('/profile/education/update', 'EducationController@updateEducation');
Route::post('/profile/education/delete', 'EducationController@deleteEducation');

//Work

Route::post('/profile/work/store', 'WorkController@store');
Route::post('/profile/work/update', 'WorkController@update');
Route::post('/profile/work/delete', 'WorkController@destroy');

//User


Route::get('/profile/{name}', 'UserController@profile')->name('profile');
Route::get('/editProfile', 'UserController@editProfile')->name('editProfile');
Route::post('/profile/store', 'UserController@storeProfile');
Route::post('/profile/edit', 'UserController@updateProfile');
Route::post('/profile/uploadphoto', 'UserController@uploadPhoto');
Route::post('/profile/updatephoto', 'UserController@updatePhoto');
Route::get('/myjobs', 'UserController@myJobs');
Route::get('/profile/jobclientprofile/{id}', 'UserController@clientJobProfiles');

//Skill

Route::post('/profile/skills/store', 'SkillController@storeSkill');
Route::post('/profile/skills/edit', 'SkillController@editSkill');

//Client

Route::get('/dashboard', 'ClientController@dashboard');
Route::get('/shortlist/{id}', 'ClientController@shortlist');
Route::get('/proposal/{id}/{user_id}', 'ClientController@proposal');
Route::get('/proposal/{id}/{user}/hire', 'ClientController@hire');
Route::get('/proposal/{id}/{user}/reject', 'ClientController@reject');
Route::post('/dashboard/activate', 'ClientController@activeJob');
Route::post('/dashboard/inactivate', 'ClientController@inActiveJob');

//Jobs Resource (CLIENT)
Route::resource('/jobsclient', 'JobController');


//User Job Application
Route::get('/job/application/{id}', 'ApplicationController@show');
Route::post('/job/application/{id}/store', 'ApplicationController@store');
Route::get('/applicant/profile/{id}', 'ApplicationController@view');

//Admin
Route::get('/adminpanel/userlist','AdminController@userList')->name('userlist');
Route::get('/adminpanel/userlist/delete/{id}','AdminController@deleteUser')->name('deleteUser');
Route::get('/adminpanel/clientlist','AdminController@clientList')->name('clientlist');
Route::get('/adminpanel/jobslist','AdminController@showJobs')->name('jobslist');
Route::get('/adminpanel/jobslist/delete/{id}', 'AdminController@deleteJob')->name('deleteJob');
Route::get('/adminpanel/categorieslist', 'AdminController@showCategories')->name('categoriesList');
Route::get('/adminpanel/categorieslist/newcategory', 'AdminController@addCategory')->name('addCategory');
Route::get('/adminpanel/categorieslist/delete/{id}','AdminController@deleteCategory')->name('deleteCategory');
Route::post('/adminpanel/categorieslist/add', 'AdminController@addCategories');
Route::get('/adminpanel/statistic','AdminController@statistic')->name('statistic');