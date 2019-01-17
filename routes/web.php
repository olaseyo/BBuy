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

Route::get('/', 'ProductController@landingGetAllMyProduct');
Route::get('/signin', function () {
    return view('admin.signin');
});

Route::get('/signup', function () {
    return view('admin.signup');
});

Route::get('/shop', function () {
    return view('pages.shop');
});


Route::get('/about','ProductController@about');

Route::get('/logOut','HomeController@logOut');

Route::get('/contactus','ProductController@contact');

Route::post('registerMerchant', 'HomeController@registerMerchant');

Route::post('Login', 'HomeController@Login');

Auth::routes();

Route::get('view_product', 'ProductController@getAllMyProduct');


//Route::group(['middleware'=>['auth','merchant']],function(){
Route::group(['middleware' => ['web']], function() {


Route::get('edit_product/{product_id}', 'ProductController@editProduct');

Route::get('product', 'ProductController@addProduct');

Route::get('product_details/{product_id}', 'ProductController@productDetails');

Route::post('DeleteProduct','ProductController@DeleteProduct');

Route::post('DeleteProductImages','ProductController@DeleteProductImages');

Route::post('createProduct','ProductController@createProduct');

Route::post('submitCategory', 'ProductController@submitCategory');
Route::get('transaction', 'PaymentController@viewTransactionInterface');
Route::get('/mdashboard', 'HomeController@merchantDashboard');



Route::get('/dashboard', 'HomeController@adminDashboard');


Route::get('admin_edit_product/{product_id}', 'ProductController@adminEditProduct');

//Route::get('/add_user', 'ProductController@adminEditProduct');

Route::get('/add_user', function () {
    return view('admin.add_user');
});

Route::get('admin_view_product', 'ProductController@adminGetAllMyProduct');


Route::post('DeleteUser','UserController@DeleteUser');

Route::get('admin_edit_user/{uid}', 'UserController@editUser');

Route::get('admin_view_user', 'UserController@getUser');

Route::post('addUser','UserController@addUser');

Route::post('markAsFeatured','ProductController@markAsFeatured');

Route::post('markAsProductOfTheDay','ProductController@markAsProductOfTheDay');


Route::post('unMarkAsFeatured','ProductController@unMarkAsFeatured');

Route::post('unMarkAsProductOfTheDay','ProductController@unMarkAsProductOfTheDay');

Route::get('/admin_product', 'ProductController@addAdminProduct');

Route::get('/add_category_page', 'ProductController@addCategoryView');

Route::get('/add_sub_category_page', 'ProductController@addSubCategoryView');

Route::get('/view_category', 'ProductController@viewCategory');

Route::get('/view_sub_category', 'ProductController@viewSubCategory');

Route::post('/DeleteCategory', 'ProductController@DeleteCategory');

Route::post('/add_category', 'ProductController@addCategory');


Route::post('/add_sub_category', 'ProductController@addSubCategory');


Route::post('/add_sub_category', 'ProductController@addSubCategory');

Route::get('/admin_edit_category/{cat_id}', 'ProductController@editCategory');

Route::get('/admin_edit_sub_category/{sub_at_id}', 'ProductController@editSubCategory');

Route::get('/compareList', 'ProductController@compareList');

Route::get('/categories/{cat_id}', 'ProductController@category');


Route::post('subscribe', 'HomeController@subscribe');


Route::get('/sub_categories/{sub_cat_id}', 'ProductController@subCategory');

Route::get('/mprofile', 'HomeController@mProfile');

//landing
Route::get('/mwish_list', 'ProductController@mWhishList');

Route::get('/mprice_alert', 'ProductController@mPriceList');

Route::get('/awish_list', 'ProductController@aWhishList');

Route::get('/aprice_alert', 'ProductController@aPriceList');

Route::post('DeleteWishList','ProductController@DeleteWishList');

Route::post('DeletePriceAlert','ProductController@DeletePriceAlert');

Route::post('createWishList','ProductController@createWishList');

Route::post('createPriceAlert','ProductController@createPriceAlert');

Route::post('compare','ProductController@compare');
Route::post('/mUpdateUsers', 'HomeController@mUpdateUsers');
Route::get('/viewSubscribers','HomeController@viewSubscribers');

});
