<?php

Route::view('/', 'welcome');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::post('categories/media', 'CategoryController@storeMedia')->name('categories.storeMedia');
    Route::post('categories/ckmedia', 'CategoryController@storeCKEditorImages')->name('categories.storeCKEditorImages');
    Route::resource('categories', 'CategoryController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Blog
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::resource('blogs', 'BlogController');

    // Top Label
    Route::delete('top-labels/destroy', 'TopLabelController@massDestroy')->name('top-labels.massDestroy');
    Route::post('top-labels/media', 'TopLabelController@storeMedia')->name('top-labels.storeMedia');
    Route::post('top-labels/ckmedia', 'TopLabelController@storeCKEditorImages')->name('top-labels.storeCKEditorImages');
    Route::resource('top-labels', 'TopLabelController');

    // Deals
    Route::delete('deals/destroy', 'DealsController@massDestroy')->name('deals.massDestroy');
    Route::resource('deals', 'DealsController');

    // Banner
    Route::delete('banners/destroy', 'BannerController@massDestroy')->name('banners.massDestroy');
    Route::post('banners/media', 'BannerController@storeMedia')->name('banners.storeMedia');
    Route::post('banners/ckmedia', 'BannerController@storeCKEditorImages')->name('banners.storeCKEditorImages');
    Route::resource('banners', 'BannerController');

    // Banne Slider
    Route::delete('banne-sliders/destroy', 'BanneSliderController@massDestroy')->name('banne-sliders.massDestroy');
    Route::post('banne-sliders/media', 'BanneSliderController@storeMedia')->name('banne-sliders.storeMedia');
    Route::post('banne-sliders/ckmedia', 'BanneSliderController@storeCKEditorImages')->name('banne-sliders.storeCKEditorImages');
    Route::resource('banne-sliders', 'BanneSliderController');

    // Offer
    Route::delete('offers/destroy', 'OfferController@massDestroy')->name('offers.massDestroy');
    Route::resource('offers', 'OfferController');

    // Special Offer
    Route::delete('special-offers/destroy', 'SpecialOfferController@massDestroy')->name('special-offers.massDestroy');
    Route::post('special-offers/media', 'SpecialOfferController@storeMedia')->name('special-offers.storeMedia');
    Route::post('special-offers/ckmedia', 'SpecialOfferController@storeCKEditorImages')->name('special-offers.storeCKEditorImages');
    Route::resource('special-offers', 'SpecialOfferController');
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
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::post('categories/media', 'CategoryController@storeMedia')->name('categories.storeMedia');
    Route::post('categories/ckmedia', 'CategoryController@storeCKEditorImages')->name('categories.storeCKEditorImages');
    Route::resource('categories', 'CategoryController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductController');

    // Blog
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::resource('blogs', 'BlogController');

    // Top Label
    Route::delete('top-labels/destroy', 'TopLabelController@massDestroy')->name('top-labels.massDestroy');
    Route::post('top-labels/media', 'TopLabelController@storeMedia')->name('top-labels.storeMedia');
    Route::post('top-labels/ckmedia', 'TopLabelController@storeCKEditorImages')->name('top-labels.storeCKEditorImages');
    Route::resource('top-labels', 'TopLabelController');

    // Deals
    Route::delete('deals/destroy', 'DealsController@massDestroy')->name('deals.massDestroy');
    Route::resource('deals', 'DealsController');

    // Banner
    Route::delete('banners/destroy', 'BannerController@massDestroy')->name('banners.massDestroy');
    Route::post('banners/media', 'BannerController@storeMedia')->name('banners.storeMedia');
    Route::post('banners/ckmedia', 'BannerController@storeCKEditorImages')->name('banners.storeCKEditorImages');
    Route::resource('banners', 'BannerController');

    // Banne Slider
    Route::delete('banne-sliders/destroy', 'BanneSliderController@massDestroy')->name('banne-sliders.massDestroy');
    Route::post('banne-sliders/media', 'BanneSliderController@storeMedia')->name('banne-sliders.storeMedia');
    Route::post('banne-sliders/ckmedia', 'BanneSliderController@storeCKEditorImages')->name('banne-sliders.storeCKEditorImages');
    Route::resource('banne-sliders', 'BanneSliderController');

    // Offer
    Route::delete('offers/destroy', 'OfferController@massDestroy')->name('offers.massDestroy');
    Route::resource('offers', 'OfferController');

    // Special Offer
    Route::delete('special-offers/destroy', 'SpecialOfferController@massDestroy')->name('special-offers.massDestroy');
    Route::post('special-offers/media', 'SpecialOfferController@storeMedia')->name('special-offers.storeMedia');
    Route::post('special-offers/ckmedia', 'SpecialOfferController@storeCKEditorImages')->name('special-offers.storeCKEditorImages');
    Route::resource('special-offers', 'SpecialOfferController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
