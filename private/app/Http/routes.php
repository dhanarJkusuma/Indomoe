<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

	Route::get('/', 'WeaboController@index');

	
	/* GET CATEGORY ROUTES */
	
	Route::get('admin/category','CategoryController@category');
	Route::get('admin/category/all','CategoryController@getAllCategory');
	Route::get('admin/category/data','CategoryController@getJSON');
	Route::get('admin/category/getAll','CategoryController@getAllCategory');
    Route::post('admin/category/add','CategoryController@insertCategory');
	Route::post('admin/category/get','CategoryController@getCategory');
	Route::post('admin/category/update/{id}','CategoryController@updateCategory');
	Route::post('admin/category/destroy','CategoryController@destroyCategory');



	/* GET ANIME ROUTES */

	Route::get('admin/anime','AnimeController@anime');
	Route::get('admin/anime/add','AnimeController@addAnimeView');
	Route::get('admin/anime/getAll','AnimeController@getAllAnime');
	Route::get('admin/anime/get','AnimeController@getAnime');
	Route::get('admin/anime/cover/{id}','AnimeController@getCover');
	Route::post('admin/anime/get','AnimeController@getAnime');
	Route::post('admin/anime/addAnime','AnimeController@insertAnime');
	Route::post('admin/anime/update/{id}','AnimeController@updateAnime');
	Route::post('admin/anime/update/cover/{id}','AnimeController@updateCover');
	Route::post('admin/anime/status','AnimeController@getStatus');
	Route::post('admin/anime/update/status/{id}','AnimeController@updateStatus');
	Route::post('admin/anime/destroy','AnimeController@destroyAnime');

	/* GET EPISODE ROUTES */

	Route::get('admin/episode','EpisodeController@episode');
	Route::get('admin/episode/add','EpisodeController@addEpisode');
	Route::get('admin/episode/update/{id_eps}','EpisodeController@updateEpisodeV');
	Route::post('admin/episode/update/{id_eps}','EpisodeController@updateEpisode');
	Route::post('admin/episode/update/ss/{id_eps}','EpisodeController@updateScreenShot');
	Route::post('admin/episode/destroy','EpisodeController@destroyEpisode');
	Route::post('admin/episode/build','EpisodeController@insertEpisode');
	Route::get('admin/episode/getTitle/{id}','EpisodeController@getTitle');
	Route::get('admin/episode/getData/{id_anime}','EpisodeController@getEpisode');
	Route::get('admin/episode/readmore/{id_anime}','EpisodeController@openedEpisode');
	Route::get('admin/episode/readmore/{id_anime}',array('as' => 'afterUpdate','uses' => 'EpisodeController@openedEpisode'));
	Route::get('admin/episode',array('as' => 'afterDelete','uses' => 'EpisodeController@episode'));

	
	/* GET DOWNLOAD ROUTES */

	Route::get('admin/episode/buildDownload/{id_post}',array('as' => 'redirectDownload','uses' =>'DownloadController@buildDownload'));
	Route::get('admin/episode/getDownload/{id_post}','DownloadController@getDownload');
	Route::post('admin/episode/buildDownload','DownloadController@insertDownload');
	Route::post('admin/episode/getDownload/get','DownloadController@selectedDownload');
	Route::post('admin/episode/getDownload/update/{id}','DownloadController@updateDownload');
	Route::post('admin/episode/getDownload/destroy','DownloadController@destroyDownload');


	/* GET MOST WATCHED ROUTES */

	Route::get('admin/mostWatched','MostWatchedController@index');
	Route::post('admin/mostWatched/build','MostWatchedController@addMW');
	Route::get('admin/mostWatched/get','MostWatchedController@getMW');
	Route::post('admin/mostWatched/destroy','MostWatchedController@destroyMW');

	/* GET PROFILE AND USER ROUTES */

	Route::get('admin/user/dashboard','UserController@dashboard');
	Route::get('admin/profile','UserController@profile');
	Route::post('admin/profile/display','UserController@setDP');
	Route::post('admin/profile/bio','UserController@editProfile');
	Route::post('admin/profile/cpass','UserController@changePassword');
	Route::get('admin/user/build','UserController@addUser');
	Route::get('admin/user/manage','UserController@manageUser');
	Route::get('admin/user/manageData','UserController@getAllUser');
	Route::post('admin/user/userRole','UserController@getRole');
	Route::post('admin/user/acl','UserController@updateRole');
	Route::post('admin/user/build','UserController@buildUser');
	Route::post('admin/user/destroy','UserController@destroyUser');

	/* GET WEABO ROUTES AJAX */
	Route::post('weabo/search','WeaboController@searchResult');

	
	/* GET WEABO ROUTES */
	Route::get('anime/list','WeaboController@animeList');
	Route::get('anime/list/{alpha}','WeaboController@alphalist');
	Route::get('anime/list/category/{category}','WeaboController@categorylist');
	Route::get('anime/{id}','WeaboController@detail');
	Route::get('anime/episode/{title}','WeaboController@detailEpisode');
	Route::get('community','WeaboController@community');
	Route::get('about_us','WeaboController@about_us');
	Route::get('vocaloid','WeaboController@vocaloid');
    Route::get('anime/category/data','WeaboController@getCategory');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

});