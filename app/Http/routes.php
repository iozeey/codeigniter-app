<?php
use App\FanLib\Registration;

//try { DB::connection()->getDatabaseName();} catch (Exception $e) {   dd($e->getMessage());}

// Event::listen('illuminate.query', function($query)
//  {
//      echo "<pre>";
//     print_r($query); echo "</pre>";
//     // Storage::append('q.log', $query);
//  });

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Events\PostRegisterEvent;
use App\FanLib\Email;

Route::controller('about', 'AboutController');
//Route::get('/get-in', ['as' => 'get-access', 'uses' => 'Auth\AuthController@getAccess']);

Route::get('/sign-in', ['as' => 'sign-in', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/sign-in', ['as' => 'sign-in', 'uses' => 'Auth\AuthController@postLogin']);

Route::get('/sign-up', ['as' => 'sign-up', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('/sign-up', ['as' => 'sign-up', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('/reset-password', ['as' => 'reset-password', 'uses' => 'Auth\AuthController@getResetPassword']);
Route::post('/reset-password', ['as' => 'reset-password', 'uses' => 'Auth\AuthController@postResetPassword']);


Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('e', function () {


});

/*social routes*/
Route::get('/sAuth/{sd}', ['as' => 'sAuth', 'uses' => 'Auth\AuthController@sAuth']);
//Route::get('/sAuth',['as'=>'sAuth','uses'=> 'Auth\AuthController@sAuth']);

//Route::get('/twitterAuth',function(){
//    return \Laravel\Socialite\Facades\Socialite::with('twitter')->redirect();
//});
//
//Route::get('/tAuthCallBack',function(){
//    $user =  \Laravel\Socialite\Facades\Socialite::with('twitter')->user();
//    dd($user);
//});
/*-----------------------------------------------*/
Route::get('/security', function () {
    return view('fanClub.security');
});
Route::get('/report', function () {
    return view('fanClub.report');
});
Route::get('/help', function () {
    return view('fanClub.help');
});

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
Route::get('/home', ['as' => 'index', 'uses' => 'HomeController@index']);

Route::get('/fan-club', ['middleware' => 'auth', 'as' => 'fan-club', 'uses' => 'FanClubController@index']);
Route::get('/user-profile', ['as' => 'user-profile', 'uses' => 'UserController@getProfile']);
Route::post('/user-profile', ['as' => 'edit-user-profile', 'uses' => 'UserController@postProfile']);


//// route to show our edit form
//Route::get('nerd/edit/{id}', array('as' => 'nerd.edit', function($id)
//{
//    // return our view and Nerd information
//    return View::make('nerd-edit') // pulls app/views/nerd-edit.blade.php
//    ->with('nerd', Nerd::find($id));
//}));
//
//// route to process the form
//Route::post('nerd/edit', function() {
//    // process our form
//});


//Route::get('/user-profile-1','FanClubController@getProfile');

Route::get('/fan-access', ['as' => 'fanAccess', 'uses' => 'FanClubController@fanAccess']);
Route::get('/fan-club-tickets-done', ['as' => 'fanClubTicketsDone', 'uses' => 'FanClubController@fanClubTicketsDone']);
Route::get('/fan-clubs', ['as' => 'fanClubs', 'uses' => 'FanClubController@fanClubs']);
Route::get('/fan-club-ticket-industry-complaints', ['as' => 'fanClubTicketIndustryComplaints', 'uses' => 'FanClubController@fanClubTicketIndustryComplaints']);
Route::get('/fan-club-ratings', ['as' => 'fanClubRatings', 'uses' => 'FanClubController@fanClubRatings']);
Route::get('/fan-club-guarantee', ['as' => 'fanClubGuarantee', 'uses' => 'FanClubController@fanClubGuarantee']);
Route::get('/fan-club-contest', ['as' => 'fanClubContest', 'uses' => 'FanClubController@fanClubContest']);
Route::get('/fan-club-polls', ['as' => 'fanClubPolls', 'uses' => 'FanClubController@fanClubPolls']);
Route::get('/fan-club-artist-and-team-merchandise', ['as' => 'fanClubArtistAndTeamMerchandise', 'uses' => 'FanClubController@fanClubArtistAndTeamMerchandise']);
Route::get('/fan-club-laws-that-affectFans', ['as' => 'fanClubLawsThatAffectFans', 'uses' => 'FanClubController@fanClubLawsThatAffectFans']);
Route::get('/fan-list', ['as' => 'fan-list', 'uses' => 'FanClubController@fanList']);