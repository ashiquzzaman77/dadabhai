<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\TemplateOneCartController;
use App\Http\Controllers\Frontend\TemplateOneController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

// Route::get('/', function () {
//     return view('frontend.frontend_dashboard');
// });

Route::get('/', [IndexController::class, 'Index'])->name('index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {

    // //User Dashboard
    // Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
    // Route::post('/user/profile/update', [UserController::class, 'UserProfileUpdate'])->name('user.profile.update');

    // //User Password
    // Route::get('/user/password', [UserController::class, 'UserPassword'])->name('user.password');
    // Route::post('/user/password/update', [UserController::class, 'UserPasswordPassword'])->name('user.password.update');

    // //User Logout
    // Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');

});

require __DIR__ . '/auth.php';
require __DIR__ . '/adminauth.php';

Route::controller(IndexController::class)->group(function () {

    //Template
    Route::get('/product/{id}/{product_slug}', 'TemplateOneProduct');
    //Single Product
    Route::get('/single-product/{id}', 'SingleProduct')->name('single.product');
    //Fqa Frontend
    Route::get('/faq', 'Faq')->name('faq');
    //Contact Frontend
    Route::get('/contact-user', 'ContactUser')->name('contact.user');
    Route::post('/send-message', 'SendMessage')->name('send.message');
    //Brand Page
    Route::get('/brand', 'BrandPage')->name('brand.page');
    Route::get('/brand-wise-product/{id}', 'BrandWiseProduct')->name('brand.wise.product');
    //About Page
    Route::get('/about', 'AboutPage')->name('about.page');

});

Route::middleware(['auth', 'verified'])->group(function () {

    //User Dashboard
    Route::get('/dashboard', [TemplateOneController::class, 'TemplateOneDashboard'])->name('template.one.dashboard');
    Route::post('/user/profile-update', [TemplateOneController::class, 'TemplateOneProfileUpdate'])->name('template.one.user.profile.update');

    //User Password
    Route::post('/user/password-update', [TemplateOneController::class, 'TemplateOnePasswordUpdate'])->name('template.one.user.password.update');

    //Template One Order Details
    Route::get('/user/order-details/{id}', [TemplateOneController::class, 'TemplateOneOrderDetails'])->name('template.one.user.order.details');

    //User Logout
    Route::get('/user-logout', [TemplateOneController::class, 'TemplateOneUserLogout'])->name('template.one.user.logout');



    //Add To WishList
    Route::get('/all-wishlist', [TemplateOneCartController::class, 'TemplateOneWishlist'])->name('wishlist');
    Route::get('/get-wishlist-product', [TemplateOneCartController::class, 'GetWishlistProduct']);
    Route::get('/wishlist-remove/{id}', [TemplateOneCartController::class, 'WishlistRemove']);


});

//Add To WishList
Route::post('/add-to-wishlist/{product_id}', [TemplateOneCartController::class, 'AddToWishList']);

// Template One Controller
Route::controller(TemplateOneController::class)->group(function () {

    ///////////////////////////// Template One //////////////////////////////

    //All Product
    Route::get('/all-product', 'TemplateOneAllProduct')->name('template.one.all_product');
    Route::post('/shop-filter', 'shopFilter')->name('shop.filter');

    //Brand Wise
    Route::get('/product/brand/{id}/{brand_slug}', 'BrandRelatedProductOne');

    //Category Page
    Route::get('/home-category', 'HomeAllCategory')->name('home.all.category.page');
    Route::get('/product/category/{id}/{category_slug}', 'CategoryRelatedProductOne');

    //Child Category
    Route::get('/product/childcategory/{id}/{childcategory_slug}', 'ChilldCategoryRelatedProductOne');

    //Contact
    Route::get('/user-contact', 'TemplateOneContact')->name('template_one.contact');
    Route::post('/user-contact/send', 'TemplateOneContactStore')->name('template_one.contact.store');

    //Product Search
    Route::post('/search', 'ProductSearch')->name('product.search');
    // Route::post('/search-product', 'SearchProduct');

    //Login
    Route::get('/dadabhai-login', 'TemplateOneLogin')->name('template.one.login');

    //Faq
    Route::get('/faq', 'TemplateOneFaq')->name('template.one.faq');

    //About Us
    Route::get('/about-us', 'TemplateOneAboutUs')->name('template.one.about');

});

//Cart Controller
Route::controller(CartController::class)->group(function () {

    //Add To Cart
    // Route::post('/dcart/data/store/{id}', 'AddToCartDetails');
    // Route::get('/product/mini/cart', 'AddMiniCart');
    // Route::get('/minicart/product/remove/{rowId}', 'RemoveMiniCart');
    // Route::get('/product-cart', 'TotalCart')->name('product.cart');

    // // My Cart
    // Route::get('/get-cart-product', 'GetCartProduct');
    // // Route::get('/get-cart-product1', 'GetCartProduct1');
    // Route::get('/cart-remove/{rowId}', 'CartRemove');
    // Route::get('/cart-decrement/{rowId}', 'CartDecrement');
    // Route::get('/cart-increment/{rowId}', 'CartIncrement');
    // //checkout
    // Route::get('/checkout', 'CheckoutCreate')->name('checkout');
    // Route::post('/checkout/store', 'CheckoutStore')->name('checkout.store');

    // /////////////////////////////////////// Template One ////////////////////////

    // //Add To Cart
    // Route::post('/product/store/{id}', 'AddToCartOne');
    // Route::get('/product/mini-cart', 'AddMiniCartTemplateOne');
    // Route::get('/minicart/product/remove/{rowId}', 'RemoveMiniCartTemplateOne');

});

//Template One Cart Controller
Route::controller(TemplateOneCartController::class)->group(function () {

    //Offer To Cart
    Route::post('/product/offer/store/{id}', 'OfferToCartTemplateOne');

    //Buy To Cart
    Route::post('/product/buy/store/{id}', 'BuyToCartTemplateOne');

    //Add To Cart
    Route::post('/product/store/{id}', 'AddToCartTemplateOne');
    Route::get('/product/mini-cart', 'AddMiniCartTemplateOne');
    Route::get('/minicart/product/remove/{rowId}', 'RemoveMiniCartTemplateOne');

    //View Cart
    Route::get('/view-cart', 'ViewCartTemplateOne')->name('template.one.view.cart');
    Route::get('/get-cart-product', 'GetCartProduct');
    Route::get('/cart-remove/{rowId}', 'CartRemove');

    Route::get('/cart-decrement/{rowId}', 'CartDecrement');
    Route::get('/cart-increment/{rowId}', 'CartIncrement');

    //CheckOut
    Route::get('/cart-checkout', 'CheckoutTemplateOne')->name('template.one.checkout');
    Route::post('/cart-checkout-store', 'CheckoutStoreTemplateOne')->name('template.checkout.store');

});
