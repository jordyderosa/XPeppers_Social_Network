<?php

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
/*

    Route::get('/',function()
    {
        return view('welcome');
    });
*/
Route::get('/',[
    'uses' => 'UserController@getWelcome',
    'as' => 'welcome'
]);

   Route::post('/signup',[
    'uses' => 'UserController@SignUp',
    'as' => 'signup'
]);
Route::post('/signin',[
    'uses' => 'UserController@SignIn',
    'as' => 'signin'
]);

   Route::get('/dashboard',[
       'middleware'=> 'auth',
       'uses' => 'PostController@getDashboard',
       'as'=> 'dashboard'
   ]);
Route::post('/createpost',[
    'uses' => 'PostController@postCreatePost',
    'as' => 'post.create',
    'middleware'=> 'auth'
]);
Route::get('/delete-post/{post_id}',[
    'uses' => 'PostController@getDeletePost',
    'as' => 'post.delete',
    'middleware'=> 'auth'
]);
Route::get('/logout',[
    'uses' => 'UserController@getLogout',
    'as'=> 'logout'
]);
/*
Route::post('/edit',function (\Illuminate\Http\Request $request)
{
    return response()->json(['message'=>$request['body']]);
});
*/
Route::post('/edit',[
    'uses' => 'PostController@postEditPost',
    'as' => 'edit',
    'middleware'=> 'auth'
]);
Route::post('/like',[
    'uses' => 'PostController@postLikePost',
    'as' => 'like',
    'middleware'=> 'auth'
]);