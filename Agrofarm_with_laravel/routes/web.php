<?php

use Illuminate\Support\Facades\Route;

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



//home page
Route::get('/','HomeController@home');
Route::post('/login','LoginController@login');

//registration
Route::get('/registration','CustomerRegistrationController@signup'); 
Route::post('/confirm_registration','CustomerRegistrationController@confirm_signup'); 


//customer

Route::group(['middleware'=>['Cus_sess']], function(){

Route::get('/customer_home','CustomerController@home');
Route::get('/customer_shop','CustomerController@shop');
Route::get('/customer_orderReport','CustomerController@orderReport');
Route::post('/customer_search_order','CustomerController@search_order'); 
Route::get('/customer_about_us','CustomerController@about_us'); 
Route::get('/customer_logout','CustomerController@logout'); 



//customer profile
Route::get('/customer_profile','CustomerProfileController@customerProfile');
Route::post('/customer_change_pass','CustomerProfileController@changePass');
Route::post('/customer_edit_info','CustomerProfileController@editInfo');
Route::post('/customer_change_pic','CustomerProfileController@changePic');




//customer Products
Route::get('/customer_crops','CustomerProductController@show_crops');
Route::get('/customer_vegetable','CustomerProductController@show_vegetable');
Route::get('/customer_fruit','CustomerProductController@show_fruit');
Route::get('/customer_view_product/{Fid}','CustomerProductController@view_product');
Route::post('/customer_add_review/{Fid}','CustomerProductController@add_review');
Route::post('/customer_search_product','CustomerProductController@search_product'); 

//customer Cart
Route::post('/customer_addcart/{Fid}','CartController@customer_addcart');
Route::get('/customer_show_cart','CartController@customer_show_cart');
Route::post('/update_cart/{Fid}','CartController@update_cart');
Route::post('/delete_cart/{Fid}','CartController@delete_cart');
Route::get('/customer_checkout','CartController@customer_checkout');
Route::post('/confirm_checkout','CartController@confirm_checkout');

//Cus_contactUs
Route::get('/contact','ContactFormController@create');
Route::post('/contact_show','ContactFormController@show');
});


Route::group(['middleware'=>['User_sess']], function(){

//owner
Route::get('/owner_home','OwnerController@home'); 
Route::get('/owner_shop','OwnerController@shop');
Route::get('/owner_profile','OwnerController@profile');
Route::get('/owner_aboutus','OwnerController@aboutus');

//owner Products
Route::get('/owner_crops','OwnerProductController@show_crops');
Route::get('/owner_fruits','OwnerProductController@show_fruits');
Route::get('/owner_vegetables','OwnerProductController@show_vegetables');
Route::get('/owner_view_product/{Fid}/{Type}','OwnerProductController@view_product');

//owner food report
Route::get('/owner_foodreport','OwnerReportController@show_foods');
Route::post('/owner_searchfood','OwnerReportController@search_foods');
Route::post('/owner_addfood','OwnerReportController@add_foods');
Route::post('/owner_updatefood','OwnerReportController@update_foods');
Route::post('/owner_deletefood','OwnerReportController@delete_foods');

//owner seed report
Route::get('/owner_seedreport','OwnerReportController@show_seeds');
Route::post('/owner_searchseed','OwnerReportController@search_seeds');
Route::post('/owner_addseed','OwnerReportController@add_seeds');
Route::post('/owner_updateseed','OwnerReportController@update_seeds');
Route::post('/owner_deleteseed','OwnerReportController@delete_seeds');

//owner pesticide report
Route::get('/owner_pesticidereport','OwnerReportController@show_pesticides');
Route::post('/owner_searchpesticide','OwnerReportController@search_pesticides');
Route::post('/owner_addpesticide','OwnerReportController@add_pesticides');
Route::post('/owner_updatepesticide','OwnerReportController@update_pesticides');
Route::post('/owner_deletepesticide','OwnerReportController@delete_pesticides');

//owner fertilizer report
Route::get('/owner_fertilizerreport','OwnerReportController@show_fertilizers');
Route::post('/owner_searchfertilizer','OwnerReportController@search_fertilizers');
Route::post('/owner_addfertilizer','OwnerReportController@add_fertilizers');
Route::post('/owner_updatefertilizer','OwnerReportController@update_fertilizers');
Route::post('/owner_deletefertilizer','OwnerReportController@delete_fertilizers');

//owner warehouse report
Route::get('/owner_warehousereport','OwnerReportController@show_warehouses');
Route::post('/owner_searchwarehouse','OwnerReportController@search_warehouses');
Route::post('/owner_addwarehouse','OwnerReportController@add_warehouses');
Route::post('/owner_updatewarehouse','OwnerReportController@update_warehouses');
Route::post('/owner_deletewarehouse','OwnerReportController@delete_warehouses');

//owner treatment report
Route::get('/owner_treatmentreport','OwnerReportController@show_treatments');
Route::post('/owner_searchtreatment','OwnerReportController@search_treatments');
Route::post('/owner_addtreatment','OwnerReportController@add_treatments');
Route::post('/owner_updatetreatment','OwnerReportController@update_treatments');
Route::post('/owner_deletetreatment','OwnerReportController@delete_treatments');

//owner order report
Route::get('/owner_orderreport','OwnerReportController@show_orders');
Route::post('/owner_searchorder','OwnerReportController@search_orders');
Route::post('/owner_addorder','OwnerReportController@add_orders');
Route::post('/owner_updateorder','OwnerReportController@update_orders');
Route::post('/owner_deleteorder','OwnerReportController@delete_orders');

//owner statistics
Route::get('/owner_statistics', 'StatisticsGraphController@index');

//owner transaction report
Route::get('/owner_transactionreport','TransactionReportController@show_transactions');
Route::post('/owner_searchtransaction','TransactionReportController@search_transactions');
Route::post('/owner_addtransaction','TransactionReportController@add_transactions');
Route::post('/owner_updatetransaction','TransactionReportController@update_transactions');
Route::post('/owner_deletetransaction','TransactionReportController@delete_transactions');

//owner appointment report
Route::get('/owner_appointmentreport','OwnerAppointmentReportController@show_appointments');
Route::post('/owner_searchappointment','OwnerAppointmentReportController@search_appointments');
Route::post('/owner_addappointment','OwnerAppointmentReportController@add_appointments');
Route::post('/owner_updateappointment','OwnerAppointmentReportController@update_appointments');
Route::post('/owner_deleteappointment','OwnerAppointmentReportController@delete_transactions');

//owner user report
Route::get('/owner_userreport','OwnerUserReportController@show_users');
Route::post('/owner_searchuser','OwnerUserReportController@search_users');
Route::post('/owner_adduser','OwnerUserReportController@add_users');
Route::post('/owner_updateuser','OwnerUserReportController@update_users');
Route::post('/owner_deleteuser','OwnerUserReportController@delete_users');

//owner employee report
Route::get('/owner_employeereport','OwnerEmployeeReportController@show_employees');
Route::post('/owner_searchemployee','OwnerEmployeeReportController@search_employees');
Route::post('/owner_addemployee','OwnerEmployeeReportController@add_employees');
Route::post('/owner_updateemployee','OwnerEmployeeReportController@update_employees');
Route::post('/owner_deleteemployee','OwnerEmployeeReportController@delete_employees');

//owner customer report
Route::get('/owner_customerreport','OwnerCustomerReportController@show_customers');
Route::post('/owner_searchcustomer','OwnerCustomerReportController@search_customers');
Route::post('/owner_updatecustomer','OwnerCustomerReportController@update_customers');
Route::post('/owner_deletecustomer','OwnerCustomerReportController@delete_customers');

//admin password change
Route::post('/owner_changepass','PasswordController@change_password');


//admin
Route::get('/admin_home','AdminController@home');
Route::get('/admin_shop','AdminController@shop');
Route::get('/admin_profile','AdminController@profile');
Route::get('/admin_aboutus','AdminController@aboutus');

//admin Products
Route::get('/admin_crops','AdminProductController@show_crops');
Route::post('/admin_searchcrops','AdminProductController@search_crops');
Route::post('/admin_searchfruits','AdminProductController@search_fruits');
Route::post('/admin_searchvegetables','AdminProductController@search_vegetables');
Route::get('/admin_fruits','AdminProductController@show_fruits');
Route::get('/admin_vegetables','AdminProductController@show_vegetables');
Route::get('/admin_view_product/{Fid}/{Type}','AdminProductController@view_product');

//admin food report
Route::get('/admin_foodreport','AdminReportController@show_foods');
Route::post('/admin_searchfood','AdminReportController@search_foods');
Route::post('/admin_addfood','AdminReportController@add_foods');
Route::post('/admin_updatefood','AdminReportController@update_foods');
Route::post('/admin_deletefood','AdminReportController@delete_foods');

//admin seed report
Route::get('/admin_seedreport','AdminReportController@show_seeds');
Route::post('/admin_searchseed','AdminReportController@search_seeds');
Route::post('/admin_addseed','AdminReportController@add_seeds');
Route::post('/admin_updateseed','AdminReportController@update_seeds');
Route::post('/admin_deleteseed','AdminReportController@delete_seeds');

//admin pesticide report
Route::get('/admin_pesticidereport','AdminReportController@show_pesticides');
Route::post('/admin_searchpesticide','AdminReportController@search_pesticides');
Route::post('/admin_addpesticide','AdminReportController@add_pesticides');
Route::post('/admin_updatepesticide','AdminReportController@update_pesticides');
Route::post('/admin_deletepesticide','AdminReportController@delete_pesticides');

//admin fertilizer report
Route::get('/admin_fertilizerreport','AdminReportController@show_fertilizers');
Route::post('/admin_searchfertilizer','AdminReportController@search_fertilizers');
Route::post('/admin_addfertilizer','AdminReportController@add_fertilizers');
Route::post('/admin_updatefertilizer','AdminReportController@update_fertilizers');
Route::post('/admin_deletefertilizer','AdminReportController@delete_fertilizers');

//admin warehouse report
Route::get('/admin_warehousereport','AdminReportController@show_warehouses');
Route::post('/admin_searchwarehouse','AdminReportController@search_warehouses');
Route::post('/admin_addwarehouse','AdminReportController@add_warehouses');
Route::post('/admin_updatewarehouse','AdminReportController@update_warehouses');
Route::post('/admin_deletewarehouse','AdminReportController@delete_warehouses');

//admin treatment report
Route::get('/admin_treatmentreport','AdminReportController@show_treatments');
Route::post('/admin_searchtreatment','AdminReportController@search_treatments');
Route::post('/admin_addtreatment','AdminReportController@add_treatments');
Route::post('/admin_updatetreatment','AdminReportController@update_treatments');
Route::post('/admin_deletetreatment','AdminReportController@delete_treatments');

//admin order report
Route::get('/admin_orderreport','AdminReportController@show_orders');
Route::post('/admin_searchorder','AdminReportController@search_orders');
Route::post('/admin_addorder','AdminReportController@add_orders');
Route::post('/admin_updateorder','AdminReportController@update_orders');
Route::post('/admin_deleteorder','AdminReportController@delete_orders');

//admin transaction report
Route::get('/admin_transactionreport','AdminTransactionController@show_transactions');
Route::post('/admin_searchtransaction','AdminTransactionController@search_transactions');
Route::post('/admin_addtransaction','AdminTransactionController@add_transactions');
Route::post('/admin_updatetransaction','AdminTransactionController@update_transactions');
Route::post('/admin_deletetransaction','AdminTransactionController@delete_transactions');

//Admin statistics
Route::get('/admin_statistics', 'AdminStatisticsGraphController@index');

//admin appointment report
Route::get('/admin_appointmentreport','AdminAppointmentReportController@show_appointments');
Route::post('/admin_searchappointment','AdminAppointmentReportController@search_appointments');
Route::post('/admin_addappointment','AdminAppointmentReportController@add_appointments');
Route::post('/admin_updateappointment','AdminAppointmentReportController@update_appointments');
Route::post('/admin_deleteappointment','AdminAppointmentReportController@delete_appointments');

//admin employee report
Route::get('/admin_employeereport','AdminEmployeeReportController@show_employees');
Route::post('/admin_searchemployee','AdminEmployeeReportController@search_employees');
Route::post('/admin_addemployee','AdminEmployeeReportController@add_employees');
Route::post('/admin_updateemployee','AdminEmployeeReportController@update_employees');
Route::post('/admin_deleteemployee','AdminEmployeeReportController@delete_employees');

//admin customer report
Route::get('/admin_customerreport','AdminCustomerReportController@show_customers');
Route::post('/admin_searchcustomer','AdminCustomerReportController@search_customers');
Route::post('/admin_updatecustomer','AdminCustomerReportController@update_customers');
Route::post('/admin_deletecustomer','AdminCustomerReportController@delete_customers');

//admin password change
Route::post('/admin_changepass','PasswordController@change_password');

//distributor 
Route::get('/distributor_home','DistributorController@home');
Route::get('/distributor_profile','DistributorController@profile');
Route::get('/distributor_aboutus','DistributorController@aboutus');
Route::get('/distributor_orderReport','DistributorController@orderReport');

//distributor transaction report
Route::get('/distributor_transactionreport','DistributorTransactionController@show_transactions');
Route::post('/distributor_searchtransaction','DistributorTransactionController@search_transactions');
Route::post('/distributor_addtransaction','DistributorTransactionController@add_transactions');
Route::post('/distributor_updatetransaction','DistributorTransactionController@update_transactions');
Route::post('/distributor_deletetransaction','DistributorTransactionController@delete_transactions');

//distributor employee report
Route::get('/distributor_employeereport','DistributorEmployeeController@show_employees');
Route::post('/distributor_searchemployee','DistributorEmployeeController@search_employees');
Route::post('/distributor_addemployee','DistributorEmployeeController@add_employees');
Route::post('/distributor_updateemployee','DistributorEmployeeController@update_employees');
Route::post('/distributor_deleteemployee','DistributorEmployeeController@delete_employees');

//distributor warehouse report
Route::get('/distributor_warehousereport','DistributorWarehouseController@show_warehouses');
Route::post('/distributor_searchwarehouse','DistributorWarehouseController@search_warehouses');
Route::post('/distributor_addwarehouse','DistributorWarehouseController@add_warehouses');
Route::post('/distributor_updatewarehouse','DistributorWarehouseController@update_warehouses');
Route::post('/distributor_deletewarehouse','DistributorWarehouseController@delete_warehouses');

//distributor shop
Route::get('/distributor_shop','DistributorController@shop');


//Distributor Products
Route::get('/distributor_crops','DistributorProductController@show_crops');
Route::get('/distributor_vegetable','DistributorProductController@show_vegetable');
Route::get('/distributor_fruit','DistributorProductController@show_fruit');
Route::get('/distributor_view_product/{Fid}','DistributorProductController@view_product');
Route::post('/distributor_add_review/{Fid}','DistributorProductController@add_review');
Route::post('/distributor_search_product','DistributorProductController@search_product'); 


//distributor cart
Route::post('/distributor_addcart/{Fid}','DistributorCartController@distributor_addcart');
Route::get('/distributor_show_cart','DistributorCartController@distributor_show_cart');
Route::post('/distributor_update_cart/{Fid}','DistributorCartController@update_cart');
Route::post('/distributor_delete_cart/{Fid}','DistributorCartController@delete_cart');
Route::get('/distributor_checkout','DistributorCartController@distributor_checkout');
Route::post('/distributor_confirm_checkout','DistributorCartController@confirm_checkout');

//distributor password change
Route::post('/distributor_changepass','PasswordController@change_password');

//logout
Route::get('/logout','LogoutController@logout');

});