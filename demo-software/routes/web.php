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

/** Home Login Page */
Route::get('/', ['middleware' => 'guest',function () {
    return view('home');
}])->name('app.get.home');


Route::post('/login', [
    'uses' => 'HomesController@login',
    'as' => 'app.post.login'
]);

Route::post('/logout', [
    'uses' => 'HomesController@logout',
    'as' => 'app.post.logout'
]);

/** Dealer Department */
Route::group(['prefix' => 'dealer', 'middleware' => 'auth'], function () {
    
    Route::get('dashboard', [
        'uses' => 'DealersController@dashboard',
        'as' => 'dealer.get.dashboard'
    ]);

    Route::get('new-client', [
        'uses' => 'DealersController@newClient',
        'as' => 'dealer.get.newClient'
    ]);

    Route::post('add-client', [
        'uses' => 'DealersController@addClient',
        'as' => 'dealer.post.addClient'
    ]);

    Route::get('encrypt', [
        'uses' => 'DealersController@encrypt',
        'as' => 'dealer.get.encrypt'
    ]);

    Route::post('encrypt-key', [
        'uses' => 'DealersController@encryptKey',
        'as' => 'dealer.post.encryptKey'
    ]);


    Route::delete('delete-client/{id}', [
        'uses' => 'DealersController@deleteClient',
        'as' => 'dealer.delete.deleteClient'
    ]);
});


/** Client Department */
Route::group(['prefix' => 'client', 'middleware' => 'auth'], function () {

    Route::get('profile', [
        'uses' => 'ClientsController@profile',
        'as' => 'client.get.profile'
    ]);

    Route::put('verify-key/{id}', [
        'uses' => 'ClientsController@verifyKey',
        'as' => 'client.post.verifyKey'
    ]);

    Route::patch('verify-key/{id}', [
        'uses' => 'ClientsController@verifyKey',
        'as' => 'client.post.verifyKey'
    ]);

    Route::post('decrypt-key', [
        'uses' => 'ClientsController@decryptKey',
        'as' => 'client.post.decryptKey'
    ]);
});