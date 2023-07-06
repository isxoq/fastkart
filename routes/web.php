<?php


use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CatalogController;

Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/category/{category}', [CatalogController::class, "category"])->name('category');
Route::get('/product/{category}', [CatalogController::class, "detail"])->name('product_detail');
Route::get('/blog', [\App\Http\Controllers\Frontend\BlogController::class, "index"])->name('blog_detail');
Route::get('/blog/{blog}', [\App\Http\Controllers\Frontend\BlogController::class, "detail"])->name('blog_detail');
Route::get('/about-us', [\App\Http\Controllers\Frontend\StaticPageController::class, "aboutUs"])->name('about_us');
Route::get('/contact-us', [\App\Http\Controllers\Frontend\StaticPageController::class, "contactUs"])->name('contact_us');
Route::get('/search', [\App\Http\Controllers\Frontend\CatalogController::class, "search"])->name('contact_us');

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

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::post('contacts/media', 'ContactController@storeMedia')->name('contacts.storeMedia');
    Route::post('contacts/ckmedia', 'ContactController@storeCKEditorImages')->name('contacts.storeCKEditorImages');
    Route::resource('contacts', 'ContactController');

    // Static Page
    Route::delete('static-pages/destroy', 'StaticPageController@massDestroy')->name('static-pages.massDestroy');
    Route::post('static-pages/media', 'StaticPageController@storeMedia')->name('static-pages.storeMedia');
    Route::post('static-pages/ckmedia', 'StaticPageController@storeCKEditorImages')->name('static-pages.storeCKEditorImages');
    Route::resource('static-pages', 'StaticPageController');

    // Deal Today
    Route::delete('deal-todays/destroy', 'DealTodayController@massDestroy')->name('deal-todays.massDestroy');
    Route::resource('deal-todays', 'DealTodayController');
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
