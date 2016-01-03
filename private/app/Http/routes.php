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

Route::get('/', function () {
    return view('welcome');
});

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
	Route::post('admin/anime/get','AnimeController@getAnime');
	Route::post('admin/anime/addAnime','AnimeController@insertAnime');
	Route::post('admin/anime/update/{id}','AnimeController@updateAnime');
	Route::post('admin/anime/destroy','AnimeController@destroyAnime');


	/* GET EPISODE ROUTES */

	Route::get('admin/episode','EpisodeController@episode');
	Route::get('admin/episode/add','EpisodeController@addEpisode');
	Route::get('admin/episode/update/{id_eps}','EpisodeController@updateEpisodeV');
	Route::post('admin/episode/update/{id_eps}','EpisodeController@updateEpisode');
	Route::post('admin/episode/destroy','EpisodeController@destroyEpisode');
	Route::post('admin/episode/build','EpisodeController@insertEpisode');
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

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
