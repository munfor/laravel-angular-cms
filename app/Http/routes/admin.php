<?php

/*
 |--------------------------------------------------------------------------
 | Admin Routes
 |--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function ()
{
	Route::get('/login', ['uses' => 'LoginController@index']);
	Route::post('/login', 'LoginController@login');

	Route::group(['middleware' => 'role:2'], function()
	{
		Route::get('/logout', ['uses' => 'LoginController@logout']);

		Route::group(['prefix' => 'api'], function()
		{
			Route::get('/dashboard', 'DashboardController@index');

			Route::resource('users', 'UserController');
			Route::post('/users/search', 'UserController@search');
			Route::post('/users/user-role-filter', 'UserController@userRoleFilter');
			Route::get('/auth-user', 'UserController@authUser');
			Route::post('/destroy-user-image', 'UserController@destroyImage');

			Route::resource('posts', 'PostController');
			Route::post('/posts/search', 'PostController@search');
			Route::post('/destroy-post-image', 'PostController@destroyImage');

			Route::resource('gallery', 'GalleryController');
			Route::post('/gallery/search', 'GalleryController@search');
			Route::post('/destroy-gallery-image', 'GalleryController@destroyImage');

			/*===================================================================
                        | Permisos
                         ====================================================================*/
			Route::resource('permisos', 'PermisosController');			                        
			Route::resource('permisos/idProg.idOper.idEmpresa.idCentro.idSecu', 'PermisosController');
                        Route::put('permisos', 'PermisosController@update');
                        
                        //----------------------------------------------------------------------
                        // NOTA: por defecto el Route::resource si se hace una acción PUT que 
                        // además tienes un valor (permisos/{id}) ejecutará el método update.
                        // Para el caso no nos sirve la configuración por defecto y entonces
                        // se ha optado por emplear Route::put
                        //----------------------------------------------------------------------
                        
		});

		Route::get('/views/{name}', function($name) {
			return View($name);
		});

			Route::any('{path?}', function () {
				return View('admin.layouts.master');
			})->where("path", ".+");

	});

});