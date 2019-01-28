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

Route::get('/', [
    'uses' => 'FrontendController@index',
    'as' => 'welcome'
]);

Route::get('/search', function() {
    $categories = \App\Category::take(4)->get();
    $posts = \App\Post::where('title', 'like', '%' . request('query') . '%' )->get();
    return view('search')
    ->with('categories', $categories)
    ->with('query', request('query'))
    ->with('posts', $posts);
});

Route::get('/post/{slug}', [
    'uses' => 'FrontendController@singlePost',
    'as' => 'post.single'
]);

Route::get('/category/{id}', [
    'uses' => 'FrontendController@categoryPost',
    'as' => 'category.single'
]);

Route::get('/tag/{id}', [
    'uses' => 'FrontendController@tagPost',
    'as' => 'tag.single'
]);

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/post/trashed',[
        'uses' => 'PostsController@trashed',
        'as' => 'post.trashed'
    ]);
    Route::get('/post/kill/{id}',[
        'uses' => 'PostsController@kill',
        'as' => 'post.kill'
    ]);
    Route::get('/post/restore/{id}',[
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'
    ]);
    Route::resource('post', 'PostsController');

    Route::resource('category', 'CategoriesController');

    Route::resource('tags', 'TagsController');

    Route::resource('user', 'UsersController');
    Route::get('user/admin/{id}', [
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);
    Route::get('user/remove-admin/{id}', [
        'uses' => 'UsersController@remove_admin',
        'as' => 'user.remove.admin'
    ]);

    Route::resource('profile', 'ProfilesController');
});
