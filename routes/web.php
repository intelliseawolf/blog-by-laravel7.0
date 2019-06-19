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

Route::group(['middleware' => ['activity']], function () {

    // Homepage Route
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('homeContact', 'HomeContactController@contactSend')->name('homeContactSend');

    // Register, Login, and forget PW Routes
    Auth::routes();
});

// Blog routes
Route::group(['prefix' => 'blog', 'middleware' => ['activity']], function () {
    // Blog
    Route::get('/', 'BlogController@index')->name('blog');

    // Authors Routes
    Route::get('authors', 'BlogController@authors')->name('authors');
    Route::get('/blogauthor/{author}', 'BlogController@author')->name('author');

    // Bloc Contact Routes
    Route::get('contact', 'ContactController@index')->name('contact');
    Route::post('contact', 'ContactController@contactSend')->name('contactSend');

    // RSS Feed Route
    Route::feeds();
});

// Super Admin only routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission:perms.super.admin', 'activity']], function () {
    //
});

// Writer and above routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission:perms.writer', 'activity']], function () {
    Route::resource('posts', 'Admin\PostController', [
        'names'    => [
            'create'    => 'posts.create',
            'index'     => 'admin.posts',
            'update'    => 'updatepost',
            'store'     => 'storepost',
            'edit'      => 'editpost',
            'destroy'   => 'destroypost',
        ],
        'except' => [
            'show',
        ],
        'parameters' => [
            'post' => 'id',
        ],
    ]);

    Route::resource('tags', 'Admin\TagController', [
        'names'    => [
            'create'    => 'createtag',
            'index'     => 'showtags',
            'update'    => 'updatetag',
            'store'     => 'storetag',
            'edit'      => 'edittag',
            'destroy'   => 'destroytag',
        ],
        'except' => [
            'show',
        ],
        'parameters' => [
            'tag' => 'id',
        ],
    ]);

    Route::get('/uploads', 'Admin\AdminController@uploads')->name('admin-uploads');

    Route::resource('themes', 'Admin\ThemesManagementController', [
        'names' => [
            'index'     => 'themes',
            'create'    => 'createtheme',
            'update'    => 'updatetheme',
            'store'     => 'storetheme',
            'edit'      => 'edittheme',
            'destroy'   => 'destroytheme',
            'show'      => 'showtheme',
        ],
    ]);
    Route::post('/update-blog-theme', 'Admin\ThemesManagementController@updateDefaultTheme')->name('update-blog-theme');
});

// User and above routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permission:perms.user', 'activity']], function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('/sitemap', 'Admin\AdminController@sitemap')->name('sitemap-admin');
    Route::post('/generate-sitemap', 'Admin\AdminController@generateSitemap')->name('generate-sitemap');
});

Route::group(['middleware' => ['activity']], function () {
    // Dynamic Pages Routes
    Route::get('/blog/{slug}/', 'BlogController@showPost');
});
