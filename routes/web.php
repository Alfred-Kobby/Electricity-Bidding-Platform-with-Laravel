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

/*Route::get('/', function () {
    return view('welcome');*/
    Route::get('/', 'LoginController@index')->name('home');
    Route::resource('producer','PowerProducerController');
    Route::resource('operator','MarketOperatorController');
    Route::resource('market_rules','MarketRulesController');
    Route::resource('transmitter','TransmitterController');
    Route::resource('bulkcustomer','BulkCustomersController');
    Route::resource('optimizer','OptimizerController');
    // Route::resource('messages','MessagesController');
    Route::resource('market_rules','MarketRulesController');
    Route::post('/operator/messages','MessagesController@operator_store');
    Route::post('messages','MessagesController@store');
    Route::resource('demand','PowerDemandController');
    Route::resource('actual_demand','ActualPowerDemandsController');
    Route::resource('bid','BidController');
    Route::post('/','LoginController@store');
    // Route::get('optimizer/edit','OptimizerController@edit');
    Route::get('/logout','LoginController@destroy');
    Route::get('/producer/edit/{producer_id}','PowerProducerController@edit');
    Route::get('/producer_user/user_edit/{id}','PowerProducerController@edit_user');
    Route::get('/bulkcustomer_user/user_edit/{id}','BulkCustomersController@edit_user');
    Route::get('/transmitter_user/user_edit/{id}','TransmitterController@edit_user');
    Route::get('/operator/edit/{operator_id}','MarketOperatorController@edit');
    Route::get('/transmitter/edit/{transmitter_id}','TransmitterController@edit');
    Route::get('/bid/edit/{id}','BidController@edit');
    Route::get('/bid/edit_units/{id}','BidController@edit_units');
    Route::get('/market_rules/edit/{rule_id}','MarketRulesController@edit');
    Route::get('/operator/message/show/{message_id}','MessagesController@show');
    Route::get('messages/producer_messages/show/{message_id}','MessagesController@show_producer');
    Route::get('messages/transmitter_messages/show/{message_id}','MessagesController@show_transmitter');
    Route::get('messages/bulkcustomer_messages/show/{message_id}','MessagesController@show_bulkcustomer');
    Route::get('/bulkcustomer/edit/{customer_id}','BulkCustomersController@edit');
    Route::put('/producer/{producer_id}/update','PowerProducerController@update');
    Route::get('/operator/producer/{producer_id}/delete','PowerProducerController@destroy');
    Route::post('/bulkcustomer/{customer_id}/update','BulkCustomersController@update');
    Route::put('/operator/{operator_id}/update','MarketOperatorController@update');
    Route::put('/transmitter/{transmitter_id}/update','TransmitterController@update');
    Route::put('/producer_user/{id}/update','PowerProducerController@update_user');
    Route::put('/bulkcustomer_user/{id}/update','BulkCustomersController@update_user');
    Route::put('/transmitter_user/{id}/update','TransmitterController@update_user');
    Route::put('/bid/{id}/update','BidController@update');
    Route::put('/bid_unit/{id}/update','BidController@update_units');
    Route::put('/market_rules/{rule_id}/update','MarketRulesController@update');
    Route::get('/operator/bulkcustomer/{customer_id}/delete','BulkCustomersController@destroy');
