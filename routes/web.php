<?php

use App\Http\Controllers\Backend\Shape\ShapeController;
use App\Http\Controllers\Fontend\FontendController;
use App\Http\Controllers\Backend\Products\ProductsController;
use App\Models\Shape;

Route::get('/auth',['as' => 'login', 'uses' => 'AuthController@login']);
Route::post('/auth',['as' => 'login_validate', 'uses' => 'AuthController@login_validate']);

Route::get('/locked',['as' => 'locked', 'uses' => 'AuthController@locked']);
Route::post('/lockedOut',['as' => 'lockedOut', 'uses' => 'AuthController@lockedOut']);

Route::get('/lockedLogout',['as' => 'lockedLogout', 'uses' => 'AuthController@lockedLogout']);
Route::get('/logout',['as' => 'logout', 'uses' => 'AuthController@logout']);

Route::get('/forgot',['as' => 'forgot', 'uses' => 'AuthController@forgot']);
Route::post('/forgot_post',['as' => 'forgot_post', 'uses' => 'AuthController@forgot_post']);

// Route::get('/resetPassword/{id}',['as' => 'resetPassword', 'uses' => 'Auth@resetPassword']);
// Route::post('/saveResetPassword/{id}',['as' => 'saveResetPassword', 'uses' => 'Auth@saveResetPassword']);
// Route::get('/resetPassword/{id}',['as' => 'resetPassword', 'uses' => 'Auth@resetPassword']);
// Route::post('/saveResetPassword/{id}',['as' => 'saveResetPassword', 'uses' => 'Auth@saveResetPassword']);

Route::group(['middleware' => ['web',]], function () {
    Route::get('/',['as' => 'homePage', 'uses' => 'Fontend\FontendController@getHomePage']);
    Route::get('/products',['as' => 'productsPage', 'uses' => 'Fontend\FontendController@getProductPage']);
    Route::get('/gallery',['as' => 'galleryPage', 'uses' => 'Fontend\FontendController@getGalleryPage']);
    Route::get('/contact',['as' => 'contactPage','uses' => 'Fontend\FontendController@getContactPage']);
    Route::get('/about',['as' => 'aboutPage','uses' => 'Fontend\FontendController@getAboutPage']);
    Route::get('/product-details/{id}',['as' => 'productsDetails', 'uses' => 'Fontend\FontendController@getProductDetailsPage']);

    //Dashboard
    // Route::group(['prefix' => 'Dashboard'], function () {
    //     Route::get('/',['as' => 'dashboard', 'middleware' => ['web'], 'uses' => 'Backend\Dashboard\DashboardController@index']);
    //     Route::get('/allDashboardDatatable',['as' => 'allCategoryDatatable', 'middleware' => ['web'], 'uses' =>'Backend\Categories\CategoriesController@datatable']);
    //     Route::get('/add-dashboard',['as' => 'addCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@add']);
    //     Route::post('/save-category',['as' => 'saveCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@save']);
    //     Route::get('/edit-category/{id}',['as' => 'editCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@edit']);
    //     Route::post('update-category',['as' => 'updateCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@update']);
    //     Route::get('delete-category/{id}',['as' => 'deleteCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@delete']);
    //     Route::post('active_inactive_category',['as' => 'active_inactive_category', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@active_inactive_category']);
    // });
});

Route::group(['prefix' => 'admin','middleware' => ['web','auth']], function () {
    Route::get('checkIdle', array('as' => 'checkIdle', function(){return 1;}));
    Route::get('', array('as' => 'baseURL', function(){return 1;}));

    //Dashboard
    Route::group(['prefix' => 'Dashboard'], function () {
        Route::get('/',['as' => 'dashboard', 'middleware' => ['web'], 'uses' => 'Backend\Dashboard\DashboardController@index']);
        Route::get('/allDashboardDatatable',['as' => 'allCategoryDatatable', 'middleware' => ['web'], 'uses' =>'Backend\Categories\CategoriesController@datatable']);
        Route::get('/add-dashboard',['as' => 'addCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@add']);
        Route::post('/save-category',['as' => 'saveCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@save']);
        Route::get('/edit-category/{id}',['as' => 'editCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@edit']);
        Route::post('update-category',['as' => 'updateCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@update']);
        Route::get('delete-category/{id}',['as' => 'deleteCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@delete']);
        Route::post('active_inactive_category',['as' => 'active_inactive_category', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@active_inactive_category']);
    });

    // Products
    Route::group(['prefix' => 'Products'], function () {
        Route::get('/',['as' => 'products', 'middleware' => ['web'], 'uses' => 'Backend\Products\ProductsController@index']);
        Route::get('/allProductsDatatable',['as' => 'allProductsDatatable', 'middleware' => ['web'], 'uses' =>'Backend\Products\ProductsController@datatable']);
        Route::get('/add-products',['as' => 'addProducts', 'middleware' => ['web'], 'uses' => 'Backend\Products\ProductsController@add']);
        Route::post('/save-products',['as' => 'saveProducts', 'middleware' => ['web'], 'uses' => 'Backend\Products\ProductsController@save']);
        Route::get('/edit-products/{id}',['as' => 'editProducts', 'middleware' => ['web'], 'uses' => 'Backend\Products\ProductsController@edit']);
        Route::post('update-products',['as' => 'updateProducts', 'middleware' => ['web'], 'uses' => 'Backend\Products\ProductsController@update']);
        Route::get('delete-products/{id}',['as' => 'deleteProducts', 'middleware' => ['web'], 'uses' => 'Backend\Products\ProductsController@delete']);
        Route::post('active_InActive_product',['as' => 'active_InActive_product', 'middleware' => ['web'], 'uses' => 'Backend\Products\ProductsController@active_InActive_product']);
    });

    // gallery
    Route::group(['prefix' => 'Gallery'], function () {
        Route::get('/',['as' => 'gallery', 'middleware' => ['web'], 'uses' => 'Backend\Gallery\GalleryController@index']);
        Route::get('/all-galleryDatatable',['as' => 'allGalleryDatatable', 'middleware' => ['web'], 'uses' =>'Backend\Gallery\GalleryController@datatable']);
        Route::get('/add-gallery',['as' => 'addGallery', 'middleware' => ['web'], 'uses' => 'Backend\Gallery\GalleryController@add']);
        Route::post('/save-Gallery',['as' => 'saveGallery', 'middleware' => ['web'], 'uses' => 'Backend\Gallery\GalleryController@save']);
        Route::get('/edit-Gallery/{id}',['as' => 'editGallery', 'middleware' => ['web'], 'uses' => 'Backend\Gallery\GalleryController@edit']);
        Route::post('update-Gallery',['as' => 'updateGallery', 'middleware' => ['web'], 'uses' => 'Backend\Gallery\GalleryController@update']);
        Route::get('delete-Gallery/{id}',['as' => 'deleteGallery', 'middleware' => ['web'], 'uses' => 'Backend\Gallery\GalleryController@delete']);
        Route::post('active_InActive_Gallery',['as' => 'active_InActive_Gallery', 'middleware' => ['web'], 'uses' => 'Backend\Gallery\GalleryController@active_InActive_Gallery']);
        Route::post('active_InActive_isSlider',['as' => 'active_InActive_isSlider', 'middleware' => ['web'], 'uses' => 'Backend\Gallery\GalleryController@active_InActive_isSlider']);
    });

    // Categories
    Route::group(['prefix' => 'Categories'], function () {
        Route::get('/all',['as' => 'allCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@index']);
        Route::get('/allCategoryDatatable',['as' => 'allCategoryDatatable', 'middleware' => ['web'], 'uses' =>'Backend\Categories\CategoriesController@datatable']);
        Route::get('/add-category',['as' => 'addCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@add']);
        Route::post('/save-category',['as' => 'saveCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@save']);
        Route::get('/edit-category/{id}',['as' => 'editCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@edit']);
        Route::post('update-category',['as' => 'updateCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@update']);
        Route::get('delete-category/{id}',['as' => 'deleteCategory', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@delete']);
        Route::post('active_inactive_category',['as' => 'active_inactive_category', 'middleware' => ['web'], 'uses' => 'Backend\Categories\CategoriesController@active_inactive_category']);
    });

    // Setting
    Route::group(['prefix' => 'settings'], function () {
        //General Setting
        Route::get('/generalSetting', ['as' => 'generalSetting', 'middleware' => ['web',], 'uses' => 'GeneralSettingsController@index']);
        Route::post('/saveGeneralSetting/{id}', ['as' => 'saveGeneralSetting', 'middleware' => ['web',], 'uses' => 'GeneralSettingsController@saveGeneralSetting']);
        //Company Setting
        Route::get('/companySetting', ['as' => 'companySetting', 'middleware' => ['web', 'permission:view-company-setting'], 'uses' => 'Backend\Settings\CompanySettingsController@index']);
        Route::post('/saveCompanySetting/{id}', ['as' => 'saveCompanySetting', 'middleware' => ['web', 'permission:update-company-setting'], 'uses' => 'Backend\Settings\CompanySettingsController@saveCompanySetting']);

    });

    //Users
    Route::group(['prefix' => 'users'], function () {
        Route::get('/all',['as' => 'allUsers', 'middleware' => ['web', 'permission:view-user'], 'uses' => 'Backend\Users\UsersController@index']);
        Route::get('/allUsersDatatable',['as' => 'allUsersDatatable', 'middleware' => ['web', 'permission:view-user'], 'uses' => 'Backend\Users\UsersController@datatable']);
        Route::get('/add',['as' => 'addUser', 'middleware' => ['web', 'permission:add-user'], 'uses' => 'Backend\Users\UsersController@add']);
        Route::post('/save',['as' => 'saveUser', 'middleware' => ['web', 'permission:add-user'], 'uses' => 'Backend\Users\UsersController@save']);
        Route::get('/edit/{id}',['as' => 'editUser', 'middleware' => ['web', 'permission:view-user'], 'uses' => 'Backend\Users\UsersController@edit']);
        Route::post('save/{id}',['as' => 'updateUser', 'middleware' => ['web', 'permission:update-user'], 'uses' => 'Backend\Users\UsersController@update']);
        Route::get('delete/{id}',['as' => 'deleteUser', 'middleware' => ['web', 'permission:delete-user'], 'uses' => 'Backend\Users\UsersController@delete']);
    });
});

// To Clear Cache
Route::get('/cc', function () {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function () {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function () {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function () {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function () {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

Route::get('/updateapp', function()
{
    exec('composer dump-autoload');
    echo 'composer dump-autoload complete';;
});

Route::get('migrate', function (){
    Artisan::call('migrate');
    return '<h1> Migrate Successfully All DataBase </h1>';
});

Route::get('seed', function (){
    Artisan::call('db:seed');

    return '<h1> DB seed Successfully All DataBase </h1>';
});

Route::get("search",[ProductsController::class,"SearchProduct"])->name("product.search");

Route::get("/shape/view",[ShapeController::class,"ShapeView"])->name("shape.view");

Route::get("/shape/add",[ShapeController::class,"ShapeAdd"])->name("shape.add");

Route::post("/shape/store",[ShapeController::class,"ShapeStore"])->name("shape.store");

Route::get("/shape/edit/{id}",[ShapeController::class,"ShapeEdit"])->name("shape.edit");

Route::post("/shape/update/{id}",[ShapeController::class,"ShapeUpdate"])->name("shape.update");

Route::get("/shape/delete/{id}",[ShapeController::class,"ShapeDelete"])->name("shape.delete");

//front sub category page

Route::get("/category/sub/{cat}/{id}",[FontendController::class,"SubCategoryView"])->name("sub.view");
