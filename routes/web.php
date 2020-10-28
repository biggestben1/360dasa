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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
//Route::get('profile', 'Auth\RegisterController@profile');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::post('topic', ['as' => 'topic',  'uses' => 'HomeController@topic']);
Route::get('getzipcode','Auth\RegisterController@getzipcode');
Route::get('topics','HomeController@topics')->name('topics');

Route::get('loadquest/{topic_id}','QuestController@loadquest')->name('loadquest');

Route::get('addquest/{id}','HomeController@addquest')->name('addquest');
Route::get('profile','HomeController@profile')->name('profile');
Route::get('terms','HomeController@terms')->name('terms');
Route::get('poll','HomeController@poll')->name('poll');

Route::post('addquested','HomeController@addquested')->name('addquested');
Route::post('solution','QuestController@solution')->name('solution');
Route::post('surveyadd','QuestController@surveyadd')->name('surveyadd');
Route::post('surveyaddtest','QuestController@surveyaddtest')->name('surveyaddtest');
Route::post('fileUpload','HomeController@fileUpload')->name('fileUpload');
Route::post('updateprofile','HomeController@updateprofile')->name('updateprofile');
Route::post('contact','HomeController@contact')->name('contact');

Route::post('addquestestions','HomeController@addquestestions')->name('addquestestions');
Route::post('editquestestions','HomeController@editquestestions')->name('editquestestions');
Route::post('addojective','HomeController@addojective')->name('addojective');
Route::post('addojectivetest','HomeController@addojectivetest')->name('addojectivetest');
Route::post('importExcel/{dbid}','HomeController@importExcel')->name('importExcel');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/objective', 'HomeController@objective')->name('objective');
Route::get('/objective2', 'HomeController@objective2')->name('objective2');
//Route::get('survey/{id}', 'QuestController@survey')->name('survey');
Route::get('surveytest/{id}', 'QuestController@surveytest')->name('surveytest');
Route::get('getmore', 'QuestController@getmore')->name('getmore');
Route::get('adddata/{id}', 'HomeController@adddata')->name('adddata');
Route::get('scoresurvey/{id}', 'QuestController@scoresurvey')->name('scoresurvey');

Route::get('editsurvey/{id}', 'HomeController@editsurvey')->name('editsurvey');
Route::get('viewsurvey/{id}', 'HomeController@viewsurvey')->name('viewsurvey');
Route::get('viewasurvey/{id}', 'HomeController@viewasurvey')->name('viewasurvey');
Route::get('viewsolutions/{id}', 'HomeController@viewsolutions')->name('viewsolutions');
Route::get('deletesurvay/{id}', 'HomeController@deletesurvay')->name('deletesurvay');
Route::get('deletedbcontact/{id}', 'HomeController@deletedbcontact')->name('deletedbcontact');
Route::get('deleteq/{id}', 'HomeController@deleteq')->name('deleteq');
Route::get('uploudexce/{id}', 'HomeController@uploudexce')->name('uploudexce');
Route::get('viewdb/{id}', 'HomeController@viewdb')->name('viewdb');
Route::get('downloadExcel/{dbid}', 'HomeController@downloadExcel')->name('downloadExcel');
Route::get('survey/new', 'SurveyController@new_survey')->name('new.survey');

Route::get('/survey/{survey}', 'SurveyController@detail_survey')->name('detail.survey');
Route::get('/survey/view/{survey}', 'QuestController@view_survey')->name('view.survey');
Route::get('/survey/answers/{survey}', 'SurveyController@view_survey_answers')->name('view.survey.answers');
Route::get('/survey/{survey}/delete', 'SurveyController@delete_survey')->name('delete.survey');

Route::get('/survey/{survey}/edit', 'SurveyController@edit')->name('edit.survey');
Route::patch('/survey/{survey}/update', 'SurveyController@update')->name('update.survey');

Route::post('/survey/view/{survey}/completed', 'AnswerController@store')->name('complete.survey');
Route::post('/survey/create', 'SurveyController@create')->name('create.survey');
Route::post('addnewdb', 'HomeController@addnewdb')->name('addnewdb');
Route::post('testmail', 'HomeController@testmail')->name('testmail');

// Questions related
Route::post('/survey/{survey}/questions', 'QuestionController@store')->name('store.question');

Route::get('/question/{question}/edit', 'QuestionController@edit')->name('edit.question');
Route::patch('/question/{question}/update', 'QuestionController@update')->name('update.question');
Route::get('send', 'QuestController@send')->name('send');
Route::get('about', 'QuestController@about')->name('about');
Route::post('updatecontact','HomeController@updatecontact')->name('updatecontact');
Route::post('updatedbcontact','HomeController@updatedbcontact')->name('updatedbcontact');
Route::get('edithdb/{id}', 'HomeController@edithdb')->name('edithdb');
Route::get('deletecontact/{id}', 'HomeController@deletecontact')->name('deletecontact');
Route::get('adddb', 'HomeController@addcontactdb')->name('adddb');
Route::get('viewnewdb', 'HomeController@viewnewdb')->name('viewnewdb');
Route::get('edithnewdb/{id}', 'HomeController@edithnewdb')->name('edithnewdb');
Route::get('sendtoall/{id}', 'HomeController@sendtoall')->name('sendtoall');
Route::get('/questionnaires/create', 'QuestionnaireController@create')->name('create');
Route::post('questionnaires', 'QuestionnaireController@store')->name('store');
Route::get('/questionnaires/{questionnaire}', 'QuestionnaireController@show')->name('show');

Route::resource('questionnaires', 'QuestionnaireController');