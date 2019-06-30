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

// Route::get('/', function () {
//     return view('welcome');
// });




//

Auth::routes();
// login
Route::get('/', 'HomeController@index')->name('home');
Route::get('indexTest', function(){
  return view('admin.indexTest');
})->name('home');
Route::get('admin','HomeController@admin')->name('admin');
Route::get('systemAdmin', 'AdminController@index')->name('systemAdmin');
Route::get('/admin/user/{id}', 'AdminController@getUser')->name('users');
Route::post('admin/updateUserDetails/{id}', 'AdminController@updateUserDetails')->name('updateUserDetails');
Route::post('admin/updateUserPassword/{id}', 'AdminController@updateUserPassword')->name('updateUserPassword');
Route::post('admin/removeUser/{id}', 'AdminController@removeUser')->name('removeUser');

Route::get('admin/createNewUserForm', 'AdminController@createNewUserForm')->name('createNewUserForm');
Route::post('admin/createNewUser', 'AdminController@createNewUser')->name('createNewUser');

Route::get('getReport', 'ReportController@getReport');

Route::get('/getChart', 'ReportController@getReport');
Route::get('/reservationData', 'ReportController@monthlyReservationData');




Route::group(['middleware' => ['AdminAccessOnly']], function()
{
  Route::get('getRoomForm', 'RoomController@getRoomForm')->name('getRoomForm');
  Route::post('storeRoom', 'RoomController@storeRoom')->name('storeRoom');
  Route::get('rooms/editRoomForm/{id}', 'RoomController@editRoomForm')->name('editRoomForm');
  Route::post('rooms/editRoom/{id}', 'RoomController@editRoom')->name('editRoom');
  Route::get('rooms/removeRoom/{id}', 'RoomController@removeRoom');
  Route::get('getPaymentTypeForm','PaymentTypeController@getPaymentTypeForm')->name('getPaymentTypeForm');
  // Route::get('getRoomForm', 'RoomController@getRoomForm')->name('getRoomForm');
  // Route::post('storeRoom', 'RoomController@storeRoom')->name('storeRoom');
  Route::post('storePaymentType','PaymentTypeController@storePaymentType')->name('storePaymentType');
  Route::get('payments/editPaymentTypeForm/{id}', 'PaymentTypeController@editPaymentTypeForm')->name('editPaymentTypeForm');
  Route::post('payments/editPaymentTypeNow/{id}', 'PaymentTypeController@editPaymentTypeNow')->name('editPaymentTypeNow');
  Route::get('payments/removePaymentType/{id}', 'PaymentTypeController@removePaymentType')->name('removePaymentType');
});
//
Route::group(['middleware' => ['auth']], function()
{

  Route::get('list', 'ReservationController@index');
  Route::get('checkinForm/{id}', 'ReservationController@getCheckinForm')->name('checkinForm');
  Route::post('updateReservation/{customer_id}', 'ReservationController@updateReservation')->name('updateReservation');
  // Route::post('checkInNow/{customer_id}', 'ReservationController@checkInNow');
  Route::match(['get','post'],'checkInNow/{customer_id}','ReservationController@checkInNow');
  Route::match(['get','post'],'cancelRes/{customer_id}', 'ReservationController@cancelRes');
  // Route::get('reservation/checkoutReservation//{resId}', 'ReservationController@checkoutReservation');
  // Route::post('checkInNow1/{customer_id}', 'ReservationController@checkInNow')->name('checkInNow');
  // Route::get('1', 'RoomController@index');
  // Route::post('createReservation', 'RoomController@createReservation');
  // Route::match(['get'],'searchRoom','RoomController@index');
	// Route::match(['get','post'],'getRoomsPriceWithAjax','RoomController@index');
  // Route::match(['get'],'searchRoom','RoomController@index');
  Route::get('searchRoom', 'RoomController@index')->name('searchRoom');
  Route::post('searchRoomResults', 'RoomController@searchRoomResults')->name('searchRoomResults');
  Route::post('searchRoomResults1', 'RoomController@createReservation')->name('createReservation');
  // Route::get('getRoomForm', 'RoomController@getRoomForm')->name('getRoomForm')->middleware('AdminAccessOnly');
  // // Route::match(['get','post'],'getRoomForm', 'ReservationController@cancelRes');
  // Route::post('storeRoom', 'RoomController@storeRoom')->name('storeRoom');
  // Route::get('rooms/editRoomForm/{id}', 'RoomController@editRoomForm')->name('editRoomForm');
  // Route::post('rooms/editRoom/{id}', 'RoomController@editRoom')->name('editRoom');
  // // Route::match(['get','post'],'rooms.editRoom/{id}', 'RoomController@editRoom');
  // Route::get('rooms/removeRoom/{id}', 'RoomController@removeRoom');
  Route::get('payments/removePayment/{payment_id}', 'PaymentController@removePayment');
  Route::get('reservation/checkoutReservation/{resId}', 'ReservationController@checkoutReservation');
  Route::get('updateResForm/{customer_id}', 'ReservationController@updateResForm')->name('updateResForm');
  Route::get('rooms/getCheckout/{resId}', 'PaymentController@getCheckout');
  Route::post('payments/makePayment/{resId}', 'PaymentController@makePayment');
  Route::get('payments/editPaymentForm/{payment_id}', 'PaymentController@editPaymentForm')->name('editPaymentForm');
  Route::post('payments/editPayment/{id}', 'PaymentController@editPayment')->name('editPayment');
  Route::get('generatepdf/{resId}', 'PaymentController@generatePDF')->name('generatePDF');
  Route::get('houseKeeping', 'RoomController@houseKeeping')->name('houseKeeping');
  Route::get('rooms/editHouseKeeping/{id}', 'RoomController@editHouseKeeping')->name('editHouseKeeping');
  Route::post('rooms/saveHouseKeeping/{id}', 'RoomController@saveHouseKeeping')->name('saveHouseKeeping');
  // Route::get('getPaymentTypeForm','PaymentTypeController@getPaymentTypeForm')->name('getPaymentTypeForm');
  // Route::post('storePaymentType','PaymentTypeController@storePaymentType')->name('storePaymentType');
  // Route::get('payments/editPaymentTypeForm/{id}', 'PaymentTypeController@editPaymentTypeForm')->name('editPaymentTypeForm');
  // Route::post('payments/editPaymentTypeNow/{id}', 'PaymentTypeController@editPaymentTypeNow')->name('editPaymentTypeNow');
  // Route::get('payments/removePaymentType/{id}', 'PaymentTypeController@removePaymentType')->name('removePaymentType');


Route::get('/search',["uses"=>'ReservationController@search', 'as' =>"search"]);


});
