<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//==================================== Customer Route Here  ==================================================//
//===========================================================================================================//
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');
                //======== Sociallite Login Route Here  ===========//
Route::get('/auth/redirect/{provider}', 'Auth\GoogleController@redirect');
Route::get('/callback/{provider}', 'Auth\GoogleController@callback');

//==================================== Admin Route Here ===================================================//
//========================================================================================================//
Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::get('admin', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\Auth\LoginController@login');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update');
        // Password Reset Routes ======
Route::get('admin/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\Auth\ResetPasswordController@reset')->name('admin.reset.update');

//==================================== Admin Deshboard Route section ==========================================//
//============================================================================================================//
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
        //Categories =======
Route::resource('category', 'Category\CategoryController');
        // Sub_Categories =======
Route::resource('subcategory', 'Subcategory\SubCategoryController');
        //Brands =======
Route::resource('brand', 'Brand\BrandController');
        // Coupon =======
Route::resource('coupon', 'Coupon\CouponController');
        // Newslatters =======
Route::resource('newslatter', 'Newslatter\NewslatterController');
        // Product =======
//Product Stock
Route::get('product/stock', 'Product\ProductController@stockProduct')->name('product.stock');
// Get subcategory by ajax ...
Route::get('product/subcategory/get', 'product\productController@subCategoryGet')->name('product.sub.get');
// Product Active ....
Route::get('product/Active/{id}', 'Product\ProductController@active')->name('product.active');
// Product Inactive ....
Route::get('product/inctive/{id}', 'Product\ProductController@inactive')->name('product.inactive');
Route::resource('product', 'Product\ProductController');

        // PostCategory =======
Route::resource('postCategory', 'Blog\CategoryController');
        // BlogPost =======
Route::resource('blogPost', 'Blog\PostController');
        // BlogPost Active ....
Route::get('blogPost/Active/{id}', 'Blog\PostController@active')->name('blogPost.active');
        // BlogPost Inactive ....
Route::get('blogPost/inctive/{id}', 'Blog\PostController@inctive')->name('blogPost.inctive');

//**============================ Admin Order Route ====================================**//
Route::get('orders/pending/list', 'Order\OrderController@index')->name('orders.index');
Route::get('orders/confirm/list', 'Order\OrderController@confirmIndex')->name('orders.confirm.index');
Route::get('orders/progress/view', 'Order\OrderController@progressIndex')->name('orders.progress.index');
Route::get('orders/delivery/view', 'Order\OrderController@deliveryIndex')->name('orders.delivery.index');
Route::get('orders/cancle/view', 'Order\OrderController@cancleIndex')->name('orders.cancle.index');
Route::get('orders/show/view/{id}', 'Order\OrderController@show')->name('orders.show');
Route::get('orders/accept/{id}', 'Order\OrderController@orderAccept')->name('orders.accept');
Route::get('orders/cancle/{id}', 'Order\OrderController@orderCancle')->name('orders.cancle');
Route::get('orders/progress/{id}', 'Order\OrderController@orderProgress')->name('orders.progressStatus');
Route::get('orders/delivery/{id}', 'Order\OrderController@orderDelivered')->name('orders.deliveryStatus');
        // Return order
Route::get('orders/return/list', 'OrderReturn\ReturnController@orderReturn')->name('orders.return.index');
Route::get('orders/return/view/{id}', 'OrderReturn\ReturnController@returnShow')->name('orders.return.view');
Route::get('orders/return/approve/{id}', 'OrderReturn\ReturnController@returnApprove')->name('return.orders.approve');
Route::get('all/return/orders/list', 'OrderReturn\ReturnController@allReturn')->name('orders.all.return.index');
        //Site Settings
Route::get('site/settings/index', 'Setting\SettingController@siteSetting')->name('site.setting.index');
Route::PUT('site/settings/update', 'Setting\SettingController@siteSettingUpdate')->name('site.setting.update');
Route::get('seo/settings', 'Setting\SettingController@seoEdit')->name('seo.index');
Route::post('seo/settings/update', 'Setting\SettingController@seoUpdate')->name('seo.update');
        // Database backup
Route::get('database/backup/list', 'Setting\SettingController@databaseIndex')->name('databasebackup.index');
Route::get('database/backup/now', 'Setting\SettingController@backupNow')->name('database.backup.now');
Route::get('download/database/{getFilename}', 'Setting\SettingController@DownloadDatabase')->name('database.download');
Route::get('delete/database/{getFilename}', 'Setting\SettingController@DeleteDatabase')->name('database.delete');
        //Order Reports
Route::get('today/order/report', 'Report\ReportController@todayOrder')->name('report.today.order');
Route::get('today/delivery/report', 'Report\ReportController@todayDelivery')->name('report.today.delivery');
Route::get('this/month/report', 'Report\ReportController@reportMonth')->name('report.this.month');
Route::get('this/year/report', 'Report\ReportController@reportYear')->name('report.this.year');
Route::get('search/report/index', 'Report\ReportController@searchIndex')->name('report.search.index');
        //Search Reports
Route::post('search/date/report', 'Report\ReportController@dateSeach')->name('report.date.search');
Route::post('search/month/report', 'Report\ReportController@monthSearch')->name('report.month.search');
Route::post('search/year/report', 'Report\ReportController@yearSearch')->name('report.year.search');
Route::post('search/between/report', 'Report\ReportController@betweenSearch')->name('report.between.search');

//**============================ Admin User Role Route ====================================**//
Route::get('all/user/list', 'Auth\UserRoleController@index')->name('user.all.list');
Route::get('create/new/subadmin', 'Auth\UserRoleController@Create')->name('create.new.user');
Route::post('create/new/subadmin/store', 'Auth\UserRoleController@Store')->name('new.user.store');
Route::get('sub/admin/edit/{id}', 'Auth\UserRoleController@userEdit')->name('user.edit');
Route::PUT('subadmin/update/{id}', 'Auth\UserRoleController@userUpdate')->name('new.user.update');
Route::delete('subadmin/delete/{id}', 'Auth\UserRoleController@userDestroy')->name('user.destroy');
        //Contact Message
Route::get('contact/message/list', 'Message\MessageController@index')->name('contact.message.list');
Route::get('contact/message/show/{id}', 'Message\MessageController@show')->name('contact.message.show');
Route::delete('contact/message/destroy/{id}', 'Message\MessageController@destroy')->name('contact.message.destroy');
        // Comment
Route::get('product/comment/list', 'Message\MessageController@commentList')->name('product.comment.list');
Route::get('product/comment/show/{id}', 'Message\MessageController@commentShow')->name('comment.show');
Route::get('product/comment/inactive/{id}', 'Message\MessageController@commentInactive')->name('comment.inactive');
Route::get('product/comment/active/{id}', 'Message\MessageController@commentActive')->name('comment.active');
Route::delete('product/comment/delete/{id}', 'Message\MessageController@commentDestroy')->name('comment.destroy');

});


//==================================== Frontend All Route Here ===================================================//
//===============================================================================================================//
        // Frontend =======
Route::get('/','FrontendController@index')->name('index');
Route::post('tracking/order','FrontendController@trakOrder')->name('tracking.order.index');
        // Newsletter =======
Route::post('newsletter', 'Frontend\NewsletterController@store')->name('store.newsletter');
        // Wishlist
Route::get('/wishlist', 'Frontend\wishlistController@wishlist')->name('customer.wishlist');
Route::get('show/wishlist/list', 'Frontend\WishlistController@showWishlist')->name('user.wishlist');
Route::DELETE('/wishlist/delete/{id}', 'Frontend\WishlistController@destroy')->name('user.wishlist.destroy');
        // Add To Cart Route Here...
Route::get('add/to/card/{id}', 'Frontend\AddCartController@addtoCart'); //Ajax
Route::post('add/cart/product', 'Frontend\AddCartController@addCart')->name('add.to.cart'); //Page Load
Route::get('show/cart', 'Frontend\AddCartController@showCart')->name('cart.product.list'); //show Cart
Route::get('/cart/product/remove/{rowId}', 'Frontend\AddCartController@removeCart')->name('cart.product.remove'); //Remove Cart
Route::post('/cart/product/update/{id}', 'Frontend\AddCartController@updateCart')->name('cart.product.update');
Route::post('insert/prodcut/cart', 'Frontend\AddCartController@insertCart')->name('product.cart.insert');
        //checkout...
Route::get('user/cheack/out', 'Frontend\AddCartController@checkOut')->name('user.checkout');
        //Apply Coupon...
Route::post('user/apply/coupon', 'Frontend\AddCartController@coupon')->name('apply.coupon');
Route::get('user/remove/coupon', 'Frontend\AddCartController@couponRemove')->name('user.coupons.remove');
        //Payment Getway
Route::get('product/payment/page', 'Frontend\PaymentController@index')->name('payment.page');
Route::post('product/payment/process', 'Frontend\PaymentController@process')->name('payment.process');
Route::post('stripe/charge/payment', 'Frontend\PaymentController@stripePayment')->name('stripe.charge');
        //product Details...
Route::get('product/details/{product_code}/{product_name}','Frontend\ProductController@productDetails');
Route::get('cart/product/view/{id}','Frontend\ProductController@productView');    //Product view
Route::get('products/category/{id}/{catname}','Frontend\ProductController@categoryProducts')->name('products.category');
Route::get('product/subcategory/{id}/{subcatname}','Frontend\ProductController@subCategoryProducts')->name('products.subcategory');
       //Blog show
Route::get('blog/show/all', 'Frontend\BlogController@Blog')->name('all.blog.show');
Route::get('blog/language/english', 'Frontend\BlogController@BlogEng')->name('language.english');
Route::get('blog/language/Bangla', 'Frontend\BlogController@BlogBan')->name('language.bangla');
        //Return Order
Route::get('single/order/view/{id}', 'Frontend\OrderController@singleOrder')->name('orders.show.single');
Route::get('return/order/{id}', 'Frontend\OrderController@returnOrder')->name('this.order.return');
        //Comment
Route::post('/comment/store', 'Frontend\CommentController@store')->name('comment.add');
Route::post('/reply/store', 'Frontend\CommentController@replyStore')->name('reply.add');
Route::get('/delete/comment/{id}', 'Frontend\CommentController@destroyComment')->name('comment.delete');
        // Products shop Route..
Route::get('/shop', 'Frontend\ProductController@productShop')->name('product.shop'); //not read
        // Contact Route..
Route::get('/contact', 'Frontend\ContactController@contact')->name('user.contact');
Route::get('/contact/store', 'Frontend\ContactController@contactStore')->name('user.contact.store');
        // Search
Route::post('/search/product', 'Frontend\SearchController@productSearch')->name('product.search');
Route::post('/product/search/resuit', 'Frontend\SearchController@productSearchResuit')->name('product.search.result');


