<?php

use App\Http\Livewire\Cartcomponent;
use App\Http\Livewire\Homecomponent;
use App\Http\Livewire\Shopcomponent;
use App\Http\Livewire\Productdetails;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Searchcomponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ThankYouComponent;
use App\Http\Livewire\WishListComponent;
use App\Http\Livewire\UserPasswordComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserReviewComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminSettingComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminAddCouponsComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCouponsComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminProductPageComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\User\UserChangePasswordComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',Homecomponent::class);
Route::get('/shop',Shopcomponent::class);
Route::get('/cart',Cartcomponent::class)->name('product.cart');
Route::get('/products/{slug}',Productdetails::class)->name('product.details'); //productdetails component
Route::get('product-category/{category_slug}',CategoryComponent::class)->name('product.category');
Route::get('/search',Searchcomponent::class)->name('product.search');
Route::get('/wishlist',WishListComponent::class)->name('product.wishlist');
Route::get('/contact-us',ContactComponent::class)->name('contact');
/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); */

//user
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');


    Route::get('/user/orders',UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}',UserOrderDetailsComponent::class)->name('user.orderdetails');
    

    Route::get('/user/review/{order_item_id}',UserReviewComponent::class)->name('user.review');
    Route::get('/user/change-password',UserChangePasswordComponent::class)->name('users.changepassword');
      

  
  });

//admin

Route::middleware(['auth:sanctum','verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');  
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}',AdminEditCategoryComponent::class)->name('admin.editcategory');


    Route::get('/admin/product',AdminProductPageComponent::class)->name('admin.products');
    Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct');


    Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slide_id}',AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');


    Route::get('/admin/home-categories',AdminHomeCategoryComponent::class)->name('admin.homecategories');
    Route::get('/admin/sales',AdminSaleComponent::class)->name('admin.sale');

    Route::get('/admin/coupons',AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupons/add',AdminAddCouponsComponent::class)->name('admin.addcoupons');
    Route::get('/admin/coupons/edit/{coupon_id}',AdminEditCouponsComponent::class)->name('admin.editcoupons');

    Route::get('/checkout',CheckoutComponent::class)->name('checkout');
    Route::get('/thank-you',ThankYouComponent::class)->name('thankyou');


    Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/order/{order_id}',AdminOrderDetailsComponent::class)->name('admin.orderdetails');

    Route::get('/admin/contact-us',AdminContactComponent::class)->name('admin.contact');

    Route::get('/admin/setting',AdminSettingComponent::class)->name('admin.settings');
  });