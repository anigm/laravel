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

//Route::get('/', function () {
//    return view('welcome');
//});

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

Route::get('/', 'IndexController@index');
Route::get('/list/{id}', 'IndexController@lists');

Route::get('/column/{id}','IndexController@column');

Route::get('/about/{id}','IndexController@about');

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => ['web'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::auth();
    Route::get('/home', ['as' => 'admin.home', 'uses' => 'HomeController@index']);
    Route::resource('admin_user', 'AdminUserController');
    Route::delete('admin/admin_user/destoryall',['as'=>'admin.admin_user.destory.all','uses'=>'AdminUserController@destoryAll']);
    Route::resource('role', 'RoleController');
    Route::delete('admin/role/destoryall',['as'=>'admin.role.destory.all','uses'=>'RoleController@destoryAll']);
    Route::get('role/{id}/permissions',['as'=>'admin.role.permissions','uses'=>'RoleController@permissions']);
    Route::post('role/{id}/permissions',['as'=>'admin.role.permissions','uses'=>'RoleController@storePermissions']);
    Route::resource('permission', 'PermissionController');
    Route::delete('admin/permission/destoryall',['as'=>'admin.permission.destory.all','uses'=>'PermissionController@destoryAll']);

    Route::get('blog/recycle',['as'=>'admin.blog.recycle','uses'=>'BlogController@recycle']);
    Route::get('blog/destroy/{id}/','BlogController@destroy');
    Route::get('blog/restore/{id}', 'BlogController@restore');
    Route::get('blog/delete/{id}', 'BlogController@delete');
    Route::resource('blog','BlogController');

    Route::get('article/recycle',['as'=>'admin.article.recycle','uses'=>'ArticleController@recycle']);
    Route::get('article/destroy/{id}/','ArticleController@destroy');
    Route::get('article/restore/{id}', 'ArticleController@restore');
    Route::get('article/delete/{id}', 'ArticleController@delete');
    Route::resource('article','ArticleController');

    Route::get('note/recycle',['as'=>'admin.note.recycle','uses'=>'NoteController@recycle']);
    Route::get('note/destroy/{id}/','NoteController@destroy');
    Route::get('note/restore/{id}', 'NoteController@restore');
    Route::get('note/delete/{id}', 'NoteController@delete');
    Route::resource('note','NoteController');

    Route::get('link/recycle',['as'=>'admin.link.recycle','uses'=>'LinkController@recycle']);
    Route::get('link/destroy/{id}/','LinkController@destroy');
    Route::get('link/restore/{id}', 'LinkController@restore');
    Route::get('link/delete/{id}', 'LinkController@delete');
    Route::resource('link','LinkController');

    Route::get('one/recycle',['as'=>'admin.one.recycle','uses'=>'OneController@recycle']);
    Route::get('one/destroy/{id}/','OneController@destroy');
    Route::get('one/restore/{id}', 'OneController@restore');
    Route::get('one/delete/{id}', 'OneController@delete');
    Route::resource('one','OneController');

//    Route::get('/backup', ['as' => 'admin.backup', 'uses' => '\Backpack\BackupManager\BackupController@index']);
//    Route::get('backup', '\Backpack\BackupManager\app\Http\Controllers\BackupController@index');
//    Route::put('backup/create', 'BackupController@create');
//    Route::get('backup/download/{file_name}', 'BackupController@download');
//    Route::delete('backup/delete/{file_name}', 'BackupController@delete');

    Route::get('category/destroy/{id}/','CategoryController@destroy');
    Route::resource('category','CategoryController');

    Route::get('tags/destroy/{id}/','TagController@destroy');
    Route::resource('tags','TagController');

    Route::resource('column','ColumnController');

    Route::get('/upload', ['as' => 'admin.upload', 'uses' => 'UploadController@index']);
    Route::get('/logs', ['as' => 'admin.logs', 'uses' => '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index']);

    Route::post('upload/file', 'UploadController@uploadFile');
    Route::delete('upload/file', 'UploadController@deleteFile');
    Route::post('upload/folder', 'UploadController@createFolder');
    Route::delete('upload/folder', 'UploadController@deleteFolder');

    Route::get('uploads', ['as' => 'admin.uploads', 'uses' => 'ImageController@getUpload']);
    Route::post('uploads', ['as' => 'uploads-post', 'uses' =>'ImageController@postUpload']);
    Route::post('uploads/delete', ['as' => 'upload-remove', 'uses' =>'ImageController@deleteUpload']);

    Route::resource('users', 'UsersController');
    Route::get('api/users', array('as'=>'api.users', 'uses'=>'UsersController@getDatatable'));

    Route::resource('systemlog', 'SystemLogController');

    Route::get('mail','MailController@index');

//    Route::get('mail/postupload','MailController@postUpload');

//    Route::get('img', 'MailController@upload');
//    Route::post('img', 'MailController@postUpload');

    Route::get('mail/getupload', ['as' => 'admin.mail.getupload', 'uses' => 'MailController@getUpload']);
    Route::post('mail/postupload', ['as' => 'admin.mail.postupload', 'uses' => 'MailController@postUpload']);
    Route::post('mail/seed', ['as' => 'admin.mail.seed', 'uses' => 'MailController@seed']);

    //Route::get('article/recycle', 'ArticleController@recycle');
    //Route::get('article/destroy/{id}/',['as'=>'admin.article.destroy','uses'=>'ArticleController@destroy']);
    //Route::get('article/restore/{id}/',['as'=>'admin.article.restore','uses'=>'ArticleController@restore']);
    //Route::get('article/delete/{id}/',['as'=>'admin.article.delete','uses'=>'ArticleController@delete']);
    //Route::get('/', ['as' => 'upload', 'uses' => 'ImageController@getUpload']);
    //Route::get('upload', 'UploadController@index');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::resource('plugin/filemanager/show', 'UsersController');
});

Route::get('/admin', function ()
{
    return redirect('/admin/login');
    //return view('admin.welcome');
});
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});