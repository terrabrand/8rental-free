<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Landlord
    Route::delete('landlords/destroy', 'LandlordController@massDestroy')->name('landlords.massDestroy');
    Route::post('landlords/media', 'LandlordController@storeMedia')->name('landlords.storeMedia');
    Route::post('landlords/ckmedia', 'LandlordController@storeCKEditorImages')->name('landlords.storeCKEditorImages');
    Route::post('landlords/parse-csv-import', 'LandlordController@parseCsvImport')->name('landlords.parseCsvImport');
    Route::post('landlords/process-csv-import', 'LandlordController@processCsvImport')->name('landlords.processCsvImport');
    Route::resource('landlords', 'LandlordController');

    // Sections
    Route::delete('sections/destroy', 'SectionsController@massDestroy')->name('sections.massDestroy');
    Route::resource('sections', 'SectionsController');

    // Units
    Route::delete('units/destroy', 'UnitsController@massDestroy')->name('units.massDestroy');
    Route::post('units/media', 'UnitsController@storeMedia')->name('units.storeMedia');
    Route::post('units/ckmedia', 'UnitsController@storeCKEditorImages')->name('units.storeCKEditorImages');
    Route::post('units/parse-csv-import', 'UnitsController@parseCsvImport')->name('units.parseCsvImport');
    Route::post('units/process-csv-import', 'UnitsController@processCsvImport')->name('units.processCsvImport');
    Route::resource('units', 'UnitsController');

    // Properties
    Route::delete('properties/destroy', 'PropertiesController@massDestroy')->name('properties.massDestroy');
    Route::post('properties/media', 'PropertiesController@storeMedia')->name('properties.storeMedia');
    Route::post('properties/ckmedia', 'PropertiesController@storeCKEditorImages')->name('properties.storeCKEditorImages');
    Route::post('properties/parse-csv-import', 'PropertiesController@parseCsvImport')->name('properties.parseCsvImport');
    Route::post('properties/process-csv-import', 'PropertiesController@processCsvImport')->name('properties.processCsvImport');
    Route::resource('properties', 'PropertiesController');

    // Maintainers
    Route::delete('maintainers/destroy', 'MaintainersController@massDestroy')->name('maintainers.massDestroy');
    Route::post('maintainers/media', 'MaintainersController@storeMedia')->name('maintainers.storeMedia');
    Route::post('maintainers/ckmedia', 'MaintainersController@storeCKEditorImages')->name('maintainers.storeCKEditorImages');
    Route::post('maintainers/parse-csv-import', 'MaintainersController@parseCsvImport')->name('maintainers.parseCsvImport');
    Route::post('maintainers/process-csv-import', 'MaintainersController@processCsvImport')->name('maintainers.processCsvImport');
    Route::resource('maintainers', 'MaintainersController');

    // Tenant
    Route::delete('tenants/destroy', 'TenantController@massDestroy')->name('tenants.massDestroy');
    Route::post('tenants/media', 'TenantController@storeMedia')->name('tenants.storeMedia');
    Route::post('tenants/ckmedia', 'TenantController@storeCKEditorImages')->name('tenants.storeCKEditorImages');
    Route::post('tenants/parse-csv-import', 'TenantController@parseCsvImport')->name('tenants.parseCsvImport');
    Route::post('tenants/process-csv-import', 'TenantController@processCsvImport')->name('tenants.processCsvImport');
    Route::resource('tenants', 'TenantController');

    // Expense Type
    Route::delete('expense-types/destroy', 'ExpenseTypeController@massDestroy')->name('expense-types.massDestroy');
    Route::post('expense-types/parse-csv-import', 'ExpenseTypeController@parseCsvImport')->name('expense-types.parseCsvImport');
    Route::post('expense-types/process-csv-import', 'ExpenseTypeController@processCsvImport')->name('expense-types.processCsvImport');
    Route::resource('expense-types', 'ExpenseTypeController');

    // Expenses
    Route::delete('expenses/destroy', 'ExpensesController@massDestroy')->name('expenses.massDestroy');
    Route::post('expenses/parse-csv-import', 'ExpensesController@parseCsvImport')->name('expenses.parseCsvImport');
    Route::post('expenses/process-csv-import', 'ExpensesController@processCsvImport')->name('expenses.processCsvImport');
    Route::resource('expenses', 'ExpensesController');

    // Document Type
    Route::delete('document-types/destroy', 'DocumentTypeController@massDestroy')->name('document-types.massDestroy');
    Route::post('document-types/parse-csv-import', 'DocumentTypeController@parseCsvImport')->name('document-types.parseCsvImport');
    Route::post('document-types/process-csv-import', 'DocumentTypeController@processCsvImport')->name('document-types.processCsvImport');
    Route::resource('document-types', 'DocumentTypeController');

    // Documents
    Route::delete('documents/destroy', 'DocumentsController@massDestroy')->name('documents.massDestroy');
    Route::post('documents/parse-csv-import', 'DocumentsController@parseCsvImport')->name('documents.parseCsvImport');
    Route::post('documents/process-csv-import', 'DocumentsController@processCsvImport')->name('documents.processCsvImport');
    Route::resource('documents', 'DocumentsController');

    // Invoice Type
    Route::delete('invoice-types/destroy', 'InvoiceTypeController@massDestroy')->name('invoice-types.massDestroy');
    Route::post('invoice-types/parse-csv-import', 'InvoiceTypeController@parseCsvImport')->name('invoice-types.parseCsvImport');
    Route::post('invoice-types/process-csv-import', 'InvoiceTypeController@processCsvImport')->name('invoice-types.processCsvImport');
    Route::resource('invoice-types', 'InvoiceTypeController');

    // Invoices
    Route::delete('invoices/destroy', 'InvoicesController@massDestroy')->name('invoices.massDestroy');
    Route::post('invoices/parse-csv-import', 'InvoicesController@parseCsvImport')->name('invoices.parseCsvImport');
    Route::post('invoices/process-csv-import', 'InvoicesController@processCsvImport')->name('invoices.processCsvImport');
    Route::resource('invoices', 'InvoicesController');

    // Income Type
    Route::delete('income-types/destroy', 'IncomeTypeController@massDestroy')->name('income-types.massDestroy');
    Route::post('income-types/parse-csv-import', 'IncomeTypeController@parseCsvImport')->name('income-types.parseCsvImport');
    Route::post('income-types/process-csv-import', 'IncomeTypeController@processCsvImport')->name('income-types.processCsvImport');
    Route::resource('income-types', 'IncomeTypeController');

    // Income
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::post('incomes/parse-csv-import', 'IncomeController@parseCsvImport')->name('incomes.parseCsvImport');
    Route::post('incomes/process-csv-import', 'IncomeController@processCsvImport')->name('incomes.processCsvImport');
    Route::resource('incomes', 'IncomeController');

    // Applications
    Route::delete('applications/destroy', 'ApplicationsController@massDestroy')->name('applications.massDestroy');
    Route::post('applications/parse-csv-import', 'ApplicationsController@parseCsvImport')->name('applications.parseCsvImport');
    Route::post('applications/process-csv-import', 'ApplicationsController@processCsvImport')->name('applications.processCsvImport');
    Route::resource('applications', 'ApplicationsController');

    // Equipment Type
    Route::delete('equipment-types/destroy', 'EquipmentTypeController@massDestroy')->name('equipment-types.massDestroy');
    Route::post('equipment-types/parse-csv-import', 'EquipmentTypeController@parseCsvImport')->name('equipment-types.parseCsvImport');
    Route::post('equipment-types/process-csv-import', 'EquipmentTypeController@processCsvImport')->name('equipment-types.processCsvImport');
    Route::resource('equipment-types', 'EquipmentTypeController');

    // Equipments
    Route::delete('equipments/destroy', 'EquipmentsController@massDestroy')->name('equipments.massDestroy');
    Route::post('equipments/media', 'EquipmentsController@storeMedia')->name('equipments.storeMedia');
    Route::post('equipments/ckmedia', 'EquipmentsController@storeCKEditorImages')->name('equipments.storeCKEditorImages');
    Route::post('equipments/parse-csv-import', 'EquipmentsController@parseCsvImport')->name('equipments.parseCsvImport');
    Route::post('equipments/process-csv-import', 'EquipmentsController@processCsvImport')->name('equipments.processCsvImport');
    Route::resource('equipments', 'EquipmentsController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
