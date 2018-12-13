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

Route::get('/', 'FrontController@Homepage');
Route::get('/shop', 'FrontController@shop');
Route::get('/product/{product}', 'FrontController@show')->name('show');
Route::get('/contact', function (){
    return view('frontend.contact');
});
Route::get('/blog/{slug}','FrontController@ShowPost')->name('show_blog_post');
Route::get('/tag/posts/{tag}','FrontController@ShowTagPosts')->name('tag_posts');
Route::get('/blog', 'FrontController@blog');
Route::get('/blogcategory/posts/{blogCategory}','FrontController@ShowCategoryPosts')->name('category_posts');
Route::post('/cart/add/{product}', 'CartController@AddToCart')->name('add_to_cart');
Route::get('/cart','CartController@Cart')->name('cart');
Route::get('/cart/remove/{product}','CartController@remove')->name('remove_cart');
Route::post('/cart/update/{rowId}','CartController@update')->name('update_cart');
Route::get('/cart/destroy/','CartController@destroy')->name('destroy_cart');
Route::get('/checkout/address/guest','CheckoutController@addressGuest')->name('checkout_address_guest');
Route::post('/contact/send','FrontController@contact');
Route::get('/checkout/delivery', function (){
    return view('frontend.checkout.delivery');
})->name('checkout_delivery');
Route::get('/checkout/payment', function (){
    return view('frontend.checkout.payment');
})->name('checkout_payment');
Route::get('/checkout/order', function (){
    return view('frontend.checkout.order_review');
})->name('checkout_order_review');

Route::get('/checkout/order/recieved', function (){
    return view('frontend.checkout.confirmation');
})->name('checkout_order_confirm');
Route::get('/checkout/address/post','CheckoutController@storeAddress')->name('checkout_address_post');
Route::get('/checkout/delivery/post','CheckoutController@storeDelivery')->name('checkout_delivery_post');
Route::get('/checkout/payment/post','CheckoutController@storePayment')->name('checkout_payment_post');
Route::get('/checkout/place_order','CheckoutController@PlaceOrder')->name('place_order');


Route::middleware(['auth'])->group(function () {

    Route::post('/wishlist/{product}/wishlists', 'CustomerController@AddWishList')->name('add');
    Route::delete('/wishlist/{product}/wishlists', 'CustomerController@RemoveWishList')->name('remove');
    Route::get('/customer/wishlist', 'CustomerController@Wishlists');
    Route::get('/customer/account', 'CustomerController@accountIndex');
    Route::get('/customer/orders', 'CustomerController@CustomerOrders');
    Route::resource('address','AddressController');
    Route::put('account/change/{id}','FrontController@ChangePassword')->name('change');
    Route::get('customer/order/{order}','CustomerController@ShowOrder')->name('show_order');
    Route::get('/checkout/address/user','CheckoutController@addressUser')->name('checkout_address_user');


});



Auth::routes();


Route::get('/admin', function () {
    return view('admin.auth.login');
})->middleware('guest:admin');

Route::prefix('admin')->group(function () {

    Route::resource('product','ProductController');
    Route::get('/login', 'Auth\AdminLoginController@ShowLogin')->name('admin.login');
    Route::post('/submit', 'Auth\AdminLoginController@Login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\AdminLoginController@Logout')->name('admin.logout');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/media', function () {
        return view('admin.media.index');
    })->middleware('auth:admin');
    Route::get('/users', 'UserController@index')->name('admin.index');
    Route::get('/user/create', 'UserController@create')->name('admin.create');
    Route::post('/users/store','UserController@store')->name('admin.store');
    Route::Put('/user/{admin}/reset','UserController@reset')->name('admin.reset');
    Route::get('/user/{admin}', 'UserController@ResetIndex')->name('admin.reset.index');
    Route::resource('tag','TagController');
    Route::resource('post','PostController');
    Route::resource('blogcategory','BlogCategoryController');
    Route::Put('/blogcategory/{id}','BlogCategoryController@publish')->name('publish');
    Route::get('/orders', 'OrderController@index')->name('order.index');
    Route::get('/order/show/{order}', 'OrderController@ShowOrder')->name('order.show');
    Route::Put('/order/{order}/confirm','OrderController@completeOrder')->name('order.complete');
    Route::Put('/order/{order}/paid','OrderController@ConfirmPayment')->name('order.paid');

});




