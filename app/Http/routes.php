<?php








Route::get('reportData/members', 'ReportData\MembersController@details');


Route::post('api/token', 'Api\AuthenticateController@authenticate');

Route::group(['prefix' => 'api', 'middleware' => ['jwt.auth']], function () {
    Route::get('dashboard', 'Api\DashboardController@index');
    Route::get('members', 'Api\MembersController@index');
    Route::get('subscriptions', 'Api\SubscriptionsController@index');
    Route::get('payments', 'Api\PaymentsController@index');
    Route::get('invoices', 'Api\InvoicesController@index');
    Route::get('invoices/paid', 'Api\InvoicesController@paid');
    Route::get('invoices/unpaid', 'Api\InvoicesController@unpaid');
    Route::get('invoices/partial', 'Api\InvoicesController@partial');
    Route::get('invoices/overpaid', 'Api\InvoicesController@overpaid');
    Route::get('enquiries', 'Api\EnquiriesController@index');
   
    Route::get('plans', 'Api\PlansController@index');

    Route::get('subscriptions/expiring', 'Api\SubscriptionsController@expiring');
    Route::get('subscriptions/expired', 'Api\SubscriptionsController@expired');
    Route::get('members/{id}', 'Api\MembersController@show');
    Route::get('subscriptions/{id}', 'Api\SubscriptionsController@show');
    Route::get('payments/{id}', 'Api\PaymentsController@show');
    Route::get('invoices/{id}', 'Api\InvoicesController@show');
    Route::get('enquiries/{id}', 'Api\EnquiriesController@show');
    Route::get('plans/{id}', 'Api\PlansController@show');
   
});


Route::group(['prefix' => 'auth'], function () {
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/dashboard', 'DashboardController@index');
   
});


Route::group(['prefix' => 'members', 'middleware' => ['auth']], function () {
    Route::get('/', ['middleware' => ['permission:manage-gymie|manage-members|view-member'], 'uses' => 'MembersController@index']);
    Route::get('all', ['middleware' => ['permission:manage-gymie|manage-members|view-member'], 'uses' => 'MembersController@index']);
    Route::get('active', ['middleware' => ['permission:manage-gymie|manage-members|view-member'], 'uses' => 'MembersController@active']);
    Route::get('inactive', ['middleware' => ['permission:manage-gymie|manage-members|view-member'], 'uses' => 'MembersController@inactive']);
    Route::get('create', ['middleware' => ['permission:manage-gymie|manage-members|add-member'], 'uses' => 'MembersController@create']);
    Route::post('/', ['middleware' => ['permission:manage-gymie|manage-members|add-member'], 'uses' => 'MembersController@store']);
    Route::get('{id}/show', ['middleware' => ['permission:manage-gymie|manage-members|view-member'], 'uses' => 'MembersController@show']);
    Route::get('{id}/edit', ['middleware' => ['permission:manage-gymie|manage-members|edit-member'], 'uses' => 'MembersController@edit']);
    Route::post('{id}/update', ['middleware' => ['permission:manage-gymie|manage-members|edit-member'], 'uses' => 'MembersController@update']);
    Route::post('{id}/archive', ['middleware' => ['permission:manage-gymie|manage-members|delete-member'], 'uses' => 'MembersController@archive']);
    Route::get('{id}/transfer', ['middleware' => ['permission:manage-gymie|manage-enquiries|transfer-enquiry'], 'uses' => 'MembersController@transfer']);
});






Route::group(['prefix' => 'plans', 'middleware' => ['auth']], function () {
    Route::get('/', ['middleware' => ['permission:manage-gymie|manage-plans|view-plan'], 'uses' => 'PlansController@index']);
    Route::get('all', ['middleware' => ['permission:manage-gymie|manage-plans|view-plan'], 'uses' => 'PlansController@index']);
    Route::get('show', ['middleware' => ['permission:manage-gymie|manage-plans|view-plan'], 'uses' => 'PlansController@show']);
    Route::get('create', ['middleware' => ['permission:manage-gymie|manage-plans|add-plan'], 'uses' => 'PlansController@create']);
    Route::post('/', ['middleware' => ['permission:manage-gymie|manage-plans|add-plan'], 'uses' => 'PlansController@store']);
    Route::get('{id}/edit', ['middleware' => ['permission:manage-gymie|manage-plans|edit-plan'], 'uses' => 'PlansController@edit']);
    Route::post('{id}/update', ['middleware' => ['permission:manage-gymie|manage-plans|edit-plan'], 'uses' => 'PlansController@update']);
    Route::post('{id}/archive', ['middleware' => ['permission:manage-gymie|manage-plans|delete-plan'], 'uses' => 'PlansController@archive']);
    Route::get('/services', ['middleware' => ['permission:manage-gymie|manage-services|view-service'], 'uses' => 'ServicesController@index']);
    Route::get('services/all', ['middleware' => ['permission:manage-gymie|manage-services|view-service'], 'uses' => 'ServicesController@index']);
    Route::get('services/create', ['middleware' => ['permission:manage-gymie|manage-services|add-service'], 'uses' => 'ServicesController@create']);
    Route::post('/services', ['middleware' => ['permission:manage-gymie|manage-services|add-service'], 'uses' => 'ServicesController@store']);
    Route::get('services/{id}/edit', ['middleware' => ['permission:manage-gymie|manage-services|edit-service'], 'uses' => 'ServicesController@edit']);
    Route::post('services/{id}/update', ['middleware' => ['permission:manage-gymie|manage-services|edit-service'], 'uses' => 'ServicesController@update']);
    Route::post('services/{id}/delete', ['middleware' => ['permission:manage-gymie|manage-services|delete-service'], 'uses' => 'ServicesController@delete']);
});


Route::group(['prefix' => 'subscriptions', 'middleware' => ['auth']], function () {
    Route::get('/', ['middleware' => ['permission:manage-gymie|manage-subscriptions|view-subscription'], 'uses' => 'SubscriptionsController@index']);
    Route::get('all', ['middleware' => ['permission:manage-gymie|manage-subscriptions|view-subscription'], 'uses' => 'SubscriptionsController@index']);
    Route::get('expiring', ['middleware' => ['permission:manage-gymie|manage-subscriptions|view-subscription'], 'uses' => 'SubscriptionsController@expiring']);
    Route::get('expired', ['middleware' => ['permission:manage-gymie|manage-subscriptions|view-subscription'], 'uses' => 'SubscriptionsController@expired']);
    Route::get('create', ['middleware' => ['permission:manage-gymie|manage-subscriptions|add-subscription'], 'uses' => 'SubscriptionsController@create']);
    Route::post('/', ['middleware' => ['permission:manage-gymie|manage-subscriptions|add-subscription'], 'uses' => 'SubscriptionsController@store']);
    Route::get('{id}/show', ['middleware' => ['permission:manage-gymie|manage-subscriptions|view-subscription'], 'uses' => 'SubscriptionsController@show']);
    Route::get('{id}/edit', ['middleware' => ['permission:manage-gymie|manage-subscriptions|edit-subscription'], 'uses' => 'SubscriptionsController@edit']);
    Route::post('{id}/update', ['middleware' => ['permission:manage-gymie|manage-subscriptions|edit-subscription'], 'uses' => 'SubscriptionsController@update']);
    Route::get('{id}/change', ['middleware' => ['permission:manage-gymie|manage-subscriptions|change-subscription'], 'uses' => 'SubscriptionsController@change']);
    Route::post('{id}/modify', ['middleware' => ['permission:manage-gymie|manage-subscriptions|change-subscription'], 'uses' => 'SubscriptionsController@modify']);
    Route::get('{id}/renew', ['middleware' => ['permission:manage-gymie|manage-subscriptions|renew-subscription'], 'uses' => 'SubscriptionsController@renew']);
    Route::post('{id}/cancelSubscription', ['middleware' => ['permission:manage-gymie|manage-subscriptions|cancel-subscription'], 'uses' => 'SubscriptionsController@cancelSubscription']);
    Route::post('{id}/delete', ['middleware' => ['permission:manage-gymie|manage-subscriptions|delete-subscription'], 'uses' => 'SubscriptionsController@delete']);
});


Route::group(['prefix' => 'invoices', 'middleware' => ['auth']], function () {
    Route::get('/', ['middleware' => ['permission:manage-gymie|manage-invoices|view-invoice'], 'uses' => 'InvoicesController@index']);
    Route::get('all', ['middleware' => ['permission:manage-gymie|manage-invoices|view-invoice'], 'uses' => 'InvoicesController@index']);
    Route::get('paid', ['middleware' => ['permission:manage-gymie|manage-invoices|view-invoice'], 'uses' => 'InvoicesController@paid']);
    Route::get('unpaid', ['middleware' => ['permission:manage-gymie|manage-invoices|view-invoice'], 'uses' => 'InvoicesController@unpaid']);
    Route::get('partial', ['middleware' => ['permission:manage-gymie|manage-invoices|view-invoice'], 'uses' => 'InvoicesController@partial']);
    Route::get('overpaid', ['middleware' => ['permission:manage-gymie|manage-invoices|view-invoice'], 'uses' => 'InvoicesController@overpaid']);
    Route::get('{id}/show', ['middleware' => ['permission:manage-gymie|manage-invoices|view-invoice'], 'uses' => 'InvoicesController@show']);
    Route::get('{id}/payment', ['middleware' => ['permission:manage-gymie|manage-invoices|add-payment'], 'uses' => 'InvoicesController@createPayment']);
    Route::post('{id}/delete', ['middleware' => ['permission:manage-gymie|manage-invoices|delete-invoice'], 'uses' => 'InvoicesController@delete']);
    Route::get('{id}/discount', ['middleware' => ['permission:manage-gymie|manage-invoices|add-discount'], 'uses' => 'InvoicesController@discount']);
    Route::post('{id}/applyDiscount', ['middleware' => ['permission:manage-gymie|manage-invoices|add-discount'], 'uses' => 'InvoicesController@applyDiscount']);
});


Route::group(['prefix' => 'payments', 'middleware' => ['auth']], function () {
    Route::get('/', ['middleware' => ['permission:manage-gymie|manage-payments|view-payment'], 'uses' => 'PaymentsController@index']);
    Route::get('all', ['middleware' => ['permission:manage-gymie|manage-payments|view-payment'], 'uses' => 'PaymentsController@index']);
    Route::get('show', ['middleware' => ['permission:manage-gymie|manage-payments|view-payment'], 'uses' => 'PaymentsController@show']);
    Route::get('create', ['middleware' => ['permission:manage-gymie|manage-payments|add-payment'], 'uses' => 'PaymentsController@create']);
    Route::post('/', ['middleware' => ['permission:manage-gymie|manage-payments|add-payment'], 'uses' => 'PaymentsController@store']);
    Route::get('{id}/edit', ['middleware' => ['permission:manage-gymie|manage-payments|edit-payment'], 'uses' => 'PaymentsController@edit']);
    Route::get('{id}/clearCheque', ['middleware' => ['permission:manage-gymie|manage-payments|edit-payment'], 'uses' => 'PaymentsController@clearCheque']);
    Route::get('{id}/depositCheque', ['middleware' => ['permission:manage-gymie|manage-payments|edit-payment'], 'uses' => 'PaymentsController@depositCheque']);
    Route::get('{id}/chequeBounce', ['middleware' => ['permission:manage-gymie|manage-payments|edit-payment'], 'uses' => 'PaymentsController@chequeBounce']);
    Route::get('{id}/chequeReissue', ['middleware' => ['permission:manage-gymie|manage-payments|edit-payment'], 'uses' => 'PaymentsController@chequeReissue']);
    Route::post('{id}/update', ['middleware' => ['permission:manage-gymie|manage-payments|edit-payment'], 'uses' => 'PaymentsController@update']);
    Route::post('{id}/delete', ['middleware' => ['permission:manage-gymie|manage-payments|delete-payment'], 'uses' => 'PaymentsController@delete']);
});


Route::group(['prefix' => 'user', 'middleware' => ['permission:manage-gymie|manage-users', 'auth']], function () {
    Route::get('/', 'AclController@userIndex');
    Route::get('create', 'AclController@createUser');
    Route::post('/', 'AclController@storeUser');
    Route::get('{id}/edit', 'AclController@editUser');
    Route::post('{id}/update', 'AclController@updateUser');
    Route::post('{id}/delete', 'AclController@deleteUser');
});


//Permissions
Route::group(['prefix' => 'user/permission', 'middleware' => ['auth', 'role:Gymie']], function () {
    Route::get('/', 'AclController@permissionIndex');
    Route::get('create', 'AclController@createPermission');
    Route::post('/', 'AclController@storePermission');
    Route::get('{id}/edit', 'AclController@editPermission');
    Route::post('{id}/update', 'AclController@updatePermission');
    Route::post('{id}/delete', 'AclController@deletePermission');
});
