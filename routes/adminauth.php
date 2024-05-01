<?php

use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\AdminAuth\ConfirmablePasswordController;
use App\Http\Controllers\AdminAuth\EmailVerificationNotificationController;
use App\Http\Controllers\AdminAuth\EmailVerificationPromptController;
use App\Http\Controllers\AdminAuth\NewPasswordController;
use App\Http\Controllers\AdminAuth\PasswordController;
use App\Http\Controllers\AdminAuth\PasswordResetLinkController;
use App\Http\Controllers\AdminAuth\VerifyEmailController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChargeController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CouponCrontroller;
use App\Http\Controllers\Admin\EmployeeCategoryController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\OfferCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SinglePageController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\SmtpController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TemplateController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\RoleController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function () {

    Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])
        ->name('admin.login');

    Route::post('admin/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('admin/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('admin.password.request');

    Route::post('admin/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('admin.password.email');

    Route::get('admin/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('admin.password.reset');

    Route::post('admin/reset-password', [NewPasswordController::class, 'store'])
        ->name('admin.password.store');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('admin/verify-email', EmailVerificationPromptController::class)
        ->name('admin.verification.notice');

    Route::get('admin/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('admin.verification.verify');

    Route::post('admin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('admin.verification.send');

    Route::get('admin/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('admin.password.confirm');

    Route::post('admin/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('admin/password', [PasswordController::class, 'update'])->name('admin.password.update');

    Route::post('admin/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('admin.logout');
});

Route::middleware(['auth:admin', 'verified'])->group(function () {

    //Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    //Admin Profile
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/update', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');

    Route::post('/admin/account/update', [AdminController::class, 'AdminAccountUpdate'])->name('admin.account.update');

    //Employee Details
    Route::get('/all/employee-details', [AdminController::class, 'AllEmployeeDetails'])->name('all.employee.details');
    Route::get('/add/employee-details', [AdminController::class, 'AddEmployeeDetails'])->name('add.employee.details');
    Route::post('/store/employee-details', [AdminController::class, 'StoreEmployeeDetails'])->name('store.employee.details');
    Route::get('/edit/employee-details/{id}', [AdminController::class, 'EditEmployeeDetails'])->name('edit.employee.details');
    Route::post('/update/employee-details', [AdminController::class, 'UpdateEmployeeDetails'])->name('update.employee.details');
    Route::get('/delete/employee-details/{id}', [AdminController::class, 'DeleteEmployeeDetails'])->name('delete.employee.details');

    //Admin Password
    Route::get('/admin-password', [AdminController::class, 'AdmiPasswordPage'])->name('admin.password.page');
    Route::post('/admin/password/update/submit', [AdminController::class, 'AdminPasswordUpdateSubmit'])->name('admin.password.update.submit');
});

Route::middleware(['auth:admin', 'verified'])->group(function () {

    //Order Section
    Route::controller(AdminOrderController::class)->prefix('admin-order')->group(function () {

        Route::get('/order-details/{id}', 'AdminOrderDetails')->name('admin.order.details');
    });

    //Product Section
    Route::controller(ProductController::class)->group(function () {

        Route::get('/all/product', 'AllProduct')->name('all.product');
        Route::get('/add/product', 'AddProduct')->name('add.product');
        Route::post('/store/product', 'StoreProduct')->name('store.product');
        Route::get('/edit/product/{id}', 'EditProduct')->name('edit.product');
        Route::post('/update/product', 'UpdateProduct')->name('update.product');
        Route::get('/delete/product/{id}', 'DeleteProduct')->name('delete.product');

        Route::post('/store/multiimage', 'StoreMultiImage')->name('store.new.multiimage');
        Route::post('/update/multiimage', 'UpdateMultiImage')->name('update.multiimg');
        Route::get('/delete/multiimage/{id}', 'DeleteMultiImage')->name('delete.multiimg');

        // Active Or Inactive
        Route::get('/product-inactive/{id}', 'InactiveProduct')->name('product.inactive');
        Route::get('/product-active/{id}', 'ActiveProduct')->name('product.active');

        Route::get('/district-get/ajax/{category_id}', 'GetCheckDistrict');
        Route::get('/state-get/ajax/{subcategory_id}', 'StateGetAjax');
    });

    //Shipping Charge
    Route::controller(ChargeController::class)->prefix('shipping')->group(function () {

        Route::get('/all/charge', 'AllShippingCharge')->name('all.shipping.charge');
        Route::post('/store/charge', 'StoreShippingCharge')->name('store.shipping.charge');
        Route::post('/update/charge', 'UpdateShippingCharge')->name('update.shipping.charge');
        Route::get('/delete/charge/{id}', 'DeleteShippingCharge')->name('delete.shipping.charge');

        //Active Or Inactive
        Route::get('/shipping-charge-inactive/{id}', 'InactiveShippingCharge')->name('shipping.charge.inactive');
        Route::get('/shipping-charge-active/{id}', 'ActiveShippingCharge')->name('shipping.charge.active');
    });

    //Shipping Charge
    Route::controller(CouponCrontroller::class)->prefix('coupon')->group(function () {

        Route::get('/all', 'AllCoupon')->name('all.coupon');
        Route::post('/store', 'StoreCoupon')->name('store.coupon');
        Route::post('/update', 'UpdateCoupon')->name('update.coupon');
        Route::get('/delete/{id}', 'DeleteCoupon')->name('delete.coupon');

        //Active Or Inactive
        Route::get('/coupon-inactive/{id}', 'InactiveCoupon')->name('coupon.inactive');
        Route::get('/coupon-active/{id}', 'ActiveCoupon')->name('coupon.active');
    });

    //Employee Dept Section
    Route::controller(EmployeeController::class)->prefix('employee')->group(function () {

        Route::get('/all', 'AllDept')->name('all.dept');
        Route::post('/store', 'StoreDept')->name('store.dept');
        Route::post('/update', 'UpdateDept')->name('update.dept');
        Route::get('/delete/{id}', 'DeleteDept')->name('delete.dept');
    });

    //Employee Category Section
    Route::controller(EmployeeCategoryController::class)->prefix('employee-category')->group(function () {

        Route::get('/all', 'AllEmployeeCategory')->name('all.employcat');
        Route::post('/store', 'StoreEmployeeCategory')->name('store.employcat');
        Route::post('/update', 'UpdateEmployeeCategory')->name('update.employcat');
        Route::get('/delete/{id}', 'DeleteEmployeeCategory')->name('delete.employcat');
    });

    //Color Section
    Route::controller(ColorController::class)->prefix('color')->group(function () {

        Route::get('/all', 'AllColor')->name('all.color');
        Route::post('/store', 'StoreColor')->name('store.color');
        Route::post('/update', 'UpdateColor')->name('update.color');
        Route::get('/delete/{id}', 'DeleteColor')->name('delete.color');
    });

    //Sites Section
    Route::controller(SiteController::class)->prefix('sites')->group(function () {

        Route::get('/all', 'AllSite')->name('all.sites');
        Route::post('/update', 'UpdateSite')->name('update.site');
        Route::get('/edit/{id}', 'EditSite')->name('edit.site');
    });

    //Contact Section
    Route::controller(ContactController::class)->prefix('contact')->group(function () {

        Route::get('/all', 'AllContact')->name('all.contact');
        Route::post('/store', 'StoreContact')->name('store.contact');
        Route::post('/update', 'UpdateContact')->name('update.contact');
        Route::get('/delete/{id}', 'DeleteContact')->name('delete.contact');
    });

    //Offer Category Section
    Route::controller(OfferCategoryController::class)->prefix('offer')->group(function () {

        Route::get('/all', 'AllOffer')->name('all.offer');
        Route::post('/store', 'StoreOffer')->name('store.offer');
        Route::post('/update', 'UpdateOffer')->name('update.offer');
        Route::get('/delete/{id}', 'DeleteOffer')->name('delete.offer');

        Route::get('/category-all', 'AllOfferCategory')->name('all.offer.category');
        Route::post('/category-store', 'StoreOfferCategory')->name('store.offer.category');
        Route::post('/category-update', 'UpdateOfferCategory')->name('update.offer.category');
        Route::get('/category-delete/{id}', 'DeleteOfferCategory')->name('delete.offer.category');

        //Active Or Inactive
        Route::get('/category-inactive/{id}', 'InactiveOfferCategory')->name('offer.inactive.category');
        Route::get('/category-active/{id}', 'ActiveOfferCategory')->name('offer.active.category');

        Route::get('/offer-inactive/{id}', 'InactiveOffer')->name('offer.inactive');
        Route::get('/offer-active/{id}', 'ActiveOffer')->name('offer.active');
    });

    //HomePage Section
    Route::controller(HomePageController::class)->prefix('home-page')->group(function () {

        Route::get('/all', 'AllHome')->name('all.home');
        Route::get('/edit/{id}', 'EditHome')->name('edit.home');
        Route::post('/update', 'UpdateHome')->name('update.home');
        Route::get('/delete/{id}', 'DeleteHome')->name('delete.home');
    });

    //Single Page Section
    Route::controller(SinglePageController::class)->prefix('single-page')->group(function () {

        Route::get('/all', 'AllSinglePage')->name('all.single.page');
        Route::get('/add', 'AddSinglePage')->name('add.single.page');
        Route::post('/store', 'StoreSinglePage')->name('store.single.page');
        Route::get('/edit/{id}', 'EditSinglePage')->name('edit.single.page');
        Route::post('/update', 'UpdateSinglePage')->name('update.single.page');
        Route::get('/delete/{id}', 'DeleteSinglePage')->name('delete.single.page');

        Route::get('/inactive/{id}', 'InactiveSinglePage')->name('inactive.single.page');
        Route::get('/active/{id}', 'ActiveSinglePage')->name('active.single.page');
    });

    //Template Section
    Route::controller(TemplateController::class)->prefix('template')->group(function () {

        Route::get('/all', 'AllTemplate')->name('all.template');
        Route::post('/update', 'UpdateTemplate')->name('update.template');
    });

    //About Section
    Route::controller(AboutController::class)->prefix('about')->group(function () {

        Route::get('/all', 'AllAbout')->name('all.about');
        Route::get('/edit/{id}', 'EditAbout')->name('edit.about');
        Route::post('/update', 'UpdateAbout')->name('update.about');
        Route::get('/delete/{id}', 'DeleteAbout')->name('delete.about');
    });

    //Faq Section
    Route::controller(FaqController::class)->prefix('faq')->group(function () {

        Route::get('/all', 'AllFaq')->name('all.faq');
        Route::post('/store', 'StoreFaq')->name('store.faq');
        Route::post('/update', 'UpdateFaq')->name('update.faq');
        Route::get('/delete/{id}', 'DeleteFaq')->name('delete.faq');

        //Active Or Inactive
        Route::get('/faq-inactive/{id}', 'InactiveFaq')->name('faq.inactive');
        Route::get('/faq-active/{id}', 'ActiveFaq')->name('faq.active');

        Route::get('/select', 'FaqSelectDelete')->name('faq.select.delete');
    });

    //Smtp Section
    Route::controller(SmtpController::class)->prefix('smtp')->group(function () {

        Route::get('/all', 'AllSmtp')->name('all.smtp');
        // Route::post('/store', 'StoreFaq')->name('store.faq');
        // Route::post('/update', 'UpdateFaq')->name('update.faq');
        // Route::get('/delete/{id}', 'DeleteFaq')->name('delete.faq');

    });

    //Terms Section
    Route::controller(TermController::class)->prefix('terms')->group(function () {

        Route::get('/all', 'AllTerm')->name('all.term');
        Route::get('/add', 'AddTerm')->name('add.term');
        Route::post('/store', 'StoreTerm')->name('store.term');
        Route::get('/edit/{id}', 'EditTerm')->name('edit.term');
        Route::post('/update', 'UpdateTerm')->name('update.term');
        Route::get('/delete/{id}', 'DeleteTerm')->name('delete.term');

        //Active Or Inactive
        Route::get('/term-inactive/{id}', 'InactiveTerm')->name('term.inactive');
        Route::get('/term-active/{id}', 'ActiveTerm')->name('term.active');
    });

    //Category Section
    Route::controller(CategoryController::class)->prefix('category')->group(function () {

        Route::get('/all', 'AllCategory')->name('all.category');
        Route::post('/store', 'StoreCategory')->name('store.category');
        Route::post('/update', 'UpdateCategory')->name('update.category');
        Route::get('/delete/{id}', 'DeleteCategory')->name('delete.category');

        //Active Or Inactive
        Route::get('/category-inactive/{id}', 'InactiveCategory')->name('category.inactive');
        Route::get('/category-active/{id}', 'ActiveCategory')->name('category.active');
    });

    //SubCategory Section
    Route::controller(SubCategoryController::class)->group(function () {

        Route::get('/all', 'AllSubCategory')->name('all.subcategory');
        Route::post('/store', 'StoreSubCategory')->name('store.subcategory');
        Route::post('/update', 'UpdateSubCategory')->name('update.subcategory');
        Route::get('/delete/{id}', 'DeleteSubCategory')->name('delete.subcategory');

        //Active Or Inactive
        Route::get('/subcategory-inactive/{id}', 'InactiveSubCategory')->name('subcategory.inactive');
        Route::get('/subcategory-active/{id}', 'ActiveSubCategory')->name('subcategory.active');

        //GetSubCategory
        Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory');
    });

    //ChildCategory Section
    Route::controller(ChildCategoryController::class)->prefix('ChildCategory')->group(function () {

        Route::get('/all', 'AllChildCategory')->name('all.childcategory');
        Route::post('/store', 'StoreChildCategory')->name('store.childcategory');
        Route::post('/update', 'UpdateChildCategory')->name('update.childcategory');
        Route::get('/delete/{id}', 'DeleteChildCategory')->name('delete.childcategory');

        //Active Or Inactive
        Route::get('/childcategory-inactive/{id}', 'InactiveChildCategory')->name('childcategory.inactive');
        Route::get('/childcategory-active/{id}', 'ActiveChildCategory')->name('childcategory.active');
    });

    //Banner Section
    Route::controller(BannerController::class)->prefix('banner')->group(function () {

        Route::get('/all', 'AllBanner')->name('all.banner');
        Route::post('/store', 'StoreBanner')->name('store.banner');
        Route::post('/update', 'UpdateBanner')->name('update.banner');
        Route::get('/delete/{id}', 'DeleteBanner')->name('delete.banner');

        //Active Or Inactive
        Route::get('/banner-inactive/{id}', 'InactiveBanner')->name('banner.inactive');
        Route::get('/banner-active/{id}', 'ActiveBanner')->name('banner.active');
    });

    //Brand Section
    Route::controller(BrandController::class)->prefix('brand')->group(function () {

        Route::get('/all', 'AllBrand')->name('all.brand');
        Route::post('/store', 'StoreBrand')->name('store.brand');
        Route::post('/update', 'UpdateBrand')->name('update.brand');
        Route::get('/delete/{id}', 'DeleteBrand')->name('delete.brand');

        // Active Or Inactive
        Route::get('/brand-inactive/{id}', 'InactiveBrand')->name('brand.inactive');
        Route::get('/brand-active/{id}', 'ActiveBrand')->name('brand.active');
    });

    //Role & Permission
    Route::controller(RoleController::class)->group(function () {

        //Permission
        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

        //Group Name
        Route::get('/all/group-name', 'AllGroupName')->name('all.group.name');
        Route::post('/store/group-name', 'StoreGroupName')->name('store.group.name');
        Route::post('/update/group-name', 'UpdateGroupName')->name('update.group.name');
        Route::get('/delete/group-name/{id}', 'DeleteGroupName')->name('delete.group.name');

        //Role
        Route::get('/all/role', 'AllRole')->name('all.role');
        Route::post('/store/role', 'StoreRole')->name('store.role');
        // Route::get('/edit/role/{id}', 'EditRole')->name('edit.role');
        Route::post('/update/role', 'UpdateRole')->name('update.role');
        Route::get('/delete/role/{id}', 'DeleteRole')->name('delete.role');

        //Role In Permission
        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store', 'RolePermissionStore')->name('store.roles.permission');
        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
        Route::get('/admin/edit/roles/{id}', 'AdminRolesEdit')->name('admin.edit.roles');
        Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');
        Route::get('/admin/delete/roles/{id}', 'AdminRolesDelete')->name('admin.delete.roles');

        //Admin Role Permission
        Route::get('/admin-all', 'AdminPermission')->name('all.admin.permission');
        Route::post('/admin-store', 'StoreAdminPermission')->name('store.admin.permission');
        Route::get('/admin-edit/{id}', 'EditAdminPermission')->name('edit.admin.permission');
        Route::post('/admin-update/{id}', 'UpdateAdmin')->name('update.admin');
        Route::get('/admin-delete/{id}', 'DeleteAdmin')->name('delete.admin');

        Route::get('/admin-inactive/{id}', 'InactiveAdmin')->name('admin.inactive');
        Route::get('/admin-active/{id}', 'ActiveAdmin')->name('admin.active');
    });


});
