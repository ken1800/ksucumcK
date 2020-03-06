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
    return view('index');
});


Route::get('/ministries', function(){
    return view('ministries');
})->name('ministries.show');

// Blog ADMIN
Auth::routes();
Route::middleware(['auth'])->group(function () {
Route::resource('leadership', 'LeadershipController');
Route::get('list', 'LeaderController@list')->name('list');
Route::get('list-post', 'PostsController@list')->name('post.list');
Route::get('/blog', 'BlogController@index')->name('blog');
});

//BLOG FRONTEND

Route::post('/subscribe', function(){

    $email =request('email');
    Newsletter::subscribe($email);
    Session::flash('subscribed','Successfully Subscribed');

    return redirect()->back();

});
 Route::get('/Blo',[

           'uses' => 'FrontEndController@index',
           'as' => 'index'


  ]);
 Route::get('Blo/post/{slug}',[

           'uses' => 'FrontEndController@singlePost',
           'as' => 'post.single'


  ]);
 Route::get('Blo/category/{id}',[

           'uses' => 'FrontEndController@category',
           'as' => 'category.single'


  ]);
 Route::get('Blo/tag/{id}',[

                   'uses' => 'FrontEndController@tag',
                   'as' => 'tag.single'


          ]);
 Route::get('/results', function(){

     $posts = \App\Post::where('title', 'like', '%' . request('query') .'%')->get();

     return view('Blog.results')->with('posts', $posts)
                           ->with('title', 'Search results:' .request('query'))
                           ->with('settings', \App\Setting::first())
                           ->with('categories', \App\Category::take(7)->get())
                           ->with('query', request('query'));

 });

    Route::get('/user/profile', [



    'uses' => 'ProfilesController@index',
    'as'   => 'user.profile'
    ]);
        Route::post('/user/profile/update', [



    'uses' => 'ProfilesController@update',
    'as'   => 'user.profile.update'
        ]);










//END BLOG FRONTEND
Route::middleware(['auth','admin'])->group(function () {

 Route::get('/users', [



    'uses' => 'UsersController@index',
    'as'   => 'users'
]);
Route::get('/user/create', [



            'uses' => 'UsersController@create',
            'as'   => 'user.create'
]);
Route::post('/user/store', [



            'uses' => 'UsersController@store',
            'as'   => 'user.store'
]);
Route::get('/user/admin/{id}', [



            'uses' => 'UsersController@admin',
            'as'   => 'user.admin'
]);

Route::get('/user/not-admin/{id}', [



            'uses' => 'UsersController@not_admin',
            'as'   => 'user.not_admin'
]);
Route::get('/user/profile', [

            'uses' => 'ProfilesController@index',
            'as'   => 'user.profile'
]);
Route::post('/user/profile/update', [

            'uses' => 'ProfilesController@update',
            'as'   => 'user.profile.update'
]);
Route::get('/user/delete/{id}', [

            'uses' => 'UsersController@destroy',
            'as'   => 'user.delete'
]);
Route::get('/settings', [

            'uses' => 'SettingsController@index',
            'as'   => 'settings'
]);
Route::post('/settings/update', [



            'uses' => 'SettingsController@update',
            'as'   => 'settings.update'
]);
Route::resource('leader', 'LeaderController');

Route::get('/settings', [

    'uses' => 'SettingsController@index',
    'as'   => 'settings'
]);
Route::post('/settings/update', [

    'uses' => 'SettingsController@update',
    'as'   => 'settings.update'
]);
Route::get('list-position', 'PositionController@list')->name('position.list');
Route::get('list-year', 'YearController@list')->name('year.list');
Route::resource('year', 'YearController');
Route::resource('position', 'PositionController');
Route::get('trashed-leader', 'LeaderController@trashed')->name('trashed-leader.index');
Route::put('restore-leader/{leader}', 'LeaderController@restore')->name('restore-leader');
//Route::get('/blog', 'BlogController@index')->name('blog');
Route::resource('post', 'PostsController');
Route::resource('tag', 'TagsController');
Route::resource('category', 'CategoryController');
Route::get('list-category', 'CategoryController@list')->name('category.list');
Route::get('list-tags', 'TagsController@list')->name('tag.list');
});

Route::get('/home', 'HomeController@index')->name('home');


