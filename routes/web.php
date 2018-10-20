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















/*********------------ADMIN-------------------**********
        **----------***------------PANEL------------***--------*/


Route::group(['middleware'=>'auth'],function(){

Route::get('/myadmin',[
	'uses'=>'AdminController@getAdminDashboard',
	'as'  => 'admin.index'
]);
Route::get('/dashboard',[
	'uses'=>'AdminController@getUserDashboard',
	'as'  => 'user.index'
]);
Route::get('/logout',[
	'uses'=>'AdminController@getLogOut',
	'as'  => 'user.logout'
]);


Route::resource('/products','ProductController');

Route::get('/all-users',[
  'uses'=>'UserController@getAllUsers',
  'as'  => 'all.users'
]); 
Route::delete('/delete-users/{id}',[
  'uses'=>'UserController@destroy',
  'as'  => 'delete.users'
]); 

Route::get('/user/commission/details/{id}',[
  'uses'=>'UserController@getUserCommissionDetails',
  'as'  => 'user.commission.details'
]);
Route::get('/user/submission/payment/{id}',[
  'uses'=>'UserController@getUserSubmissionPayment',
  'as'  => 'user.submission.payment'
]);
Route::get('/add-user',[
  'uses'=>'UserController@getAddUser',
  'as'  => 'add.user'
]);
Route::post('/add-user',[
  'uses'=>'UserController@postAddUser',
  'as'  => 'add.user'
]);


Route::get('/selling/requests',[
  'uses'=>'AdminDashController@getSellingRequests',
  'as'  => 'selling.requests'
]);
Route::get('/selling/requests/approved',[
  'uses'=>'AdminDashController@getApprovedSellingRequests',
  'as'  => 'selling.requests.approved'
]);
Route::get('/selling/requests/rejected',[
  'uses'=>'AdminDashController@getRejectedSellingRequests',
  'as'  => 'selling.requests.rejected'
]);
Route::get('/selling/product/details/{id}',[
  'uses'=>'AdminDashController@getSellingProductDetails',
  'as'  => 'product.details'
]);
Route::get('/selling/product/approved/{id}',[
  'uses'=>'AdminDashController@getSellingProductApproved',
  'as'  => 'product.approved'
]);
Route::get('/selling/product/rejected/{id}',[
  'uses'=>'AdminDashController@getSellingProductRejected',
  'as'  => 'product.rejected'
]);
Route::get('/selling/product/completed/{id}',[
  'uses'=>'AdminDashController@getSellingProductCompleted',
  'as'  => 'make.product.completed'
]);


Route::get('/admin-total-expense',[
  'uses'=>'AdminDashController@getTotalExpense',
  'as'  => 'admin.total.expense'
]); 
Route::get('/admin-total-selling-income',[
  'uses'=>'AdminDashController@getTotalSellingIncome',
  'as'  => 'admin.selling.income'
]); 




 /*******Admin Profile******/
Route::get('/admin-profile',[
  'uses'=>'AdminController@getAdminProfile',
  'as'  => 'admin.profile'
]);
Route::post('/admin-profile',[
  'uses'=>'AdminController@postChangeAdminEmail',
  'as'  => 'changeadmin.email'
]);
Route::post('/admin-profile-change-password',[
  'uses'=>'AdminController@postChangePassword',
  'as'  => 'changeadmin.password'
]);

 /*******Admin Profile**********/
   

/***********User Dashboard*************/
Route::get('/sell-products',[
  'uses'=>'UserDashController@AllAvaibleProductForSelling',
  'as'  => 'available.products'
]);
Route::post('/sell-products',[
  'uses'=>'UserDashController@postAllSelectedProduct',
  'as'  => 'products.selected'
]);
Route::get('/sell/product',[
  'uses'=>'UserDashController@getSellProduct',
  'as'  => 'sell.product'
]);
Route::post('/sell/product',[
  'uses'=>'UserDashController@postSellProduct',
  'as'  => 'sell.product'
]);

Route::get('/sold/products/references',[
  'uses'=>'UserDashController@getSoldProductByReference',
  'as'  => 'sold.product.reference'
]);

Route::get('/sold/products/{ref_id}',[
  'uses'=>'UserDashController@getSoldProduct',
  'as'  => 'sold.product'
]);
Route::get('/user/products/revenue',[
  'uses'=>'UserDashController@getUserProductRevenue',
  'as'  => 'user.product.revenue'
]);

/********************/

});










/***Login & Register Start*****/ 
Route::group(['middleware'=>'guest'],function(){

Route::get('/',[
	'uses'=>'AdminController@getLogin',
	'as'  => 'user.login'
]);
Route::post('/',[
	'uses'=>'AdminController@postLogin',
	'as'  => 'user.login'
]);
//Reset Password Routes

Route::get('password/reset',['as'=>'password.reset','uses'=>'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email',['as'=>'password.email','uses'=>'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token?}',['as'=>'password.resetform','uses'=>'Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset',['as'=>'password.nowreset','uses'=>'Auth\ResetPasswordController@reset']);

});


Route::get('/register',[
	'uses'=>'AdminController@getRegister',
	'as'  => 'user.register'
]);
Route::post('/register',[
	'uses'=>'AdminController@postRegister',
	'as'  => 'user.register'
]);

/***Login & Register End*****/ 