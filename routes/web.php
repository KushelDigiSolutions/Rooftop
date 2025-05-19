<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FranchiseTempController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AppointmentController;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ZipCodeController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\DesignTypeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CompositionController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\SupplierCollectionController;
use App\Http\Controllers\SupplierCollectionDesignController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UsageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SubContractorController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use PHPUnit\Framework\Attributes\Group;


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('optimize');
    Artisan::call('route:cache');
    Artisan::call('config:cache');

    return response()->json(['message' => 'All caches cleared and optimized.']);
});

Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/appointments', [AppointmentController::class, 'schedule_appointment'])->name('appointments.schedule_appointment');
//Route::get('/appointments', function () { return view('frontend.schedule_appointment'); });
Route::get('/contact', function () { return view('frontend.contact'); });
Route::get('/terms-and-conditions', function () { return view('frontend.terms_and_conditions'); });
Route::get('/how', function () { return view('frontend.how'); });
Route::get('/privacy-policy', function () { return view('frontend.privacy_policy');});
// Route::get('/whatsappapitest', function () { return view('frontend.whatsappapitest');});
Route::get('/whatsappapitest', [QuotationController::class, 'whatsapptest']);
Route::get('/refund-policy', function () { return view('frontend.refund-policy');});
Route::get('/faq', function () { return view('frontend.faq');});
Route::get('/services', function () { return view('frontend.services');});
Route::get('/our-products', function () { return view('frontend.our_products');});
Route::get('/about', function () { return view('frontend.about'); });
// Route::get('/', function () { return view('frontend.index'); });
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/franchise-registration', [FranchiseTempController::class, 'frontend_view']);
Route::get('/login', function () { return view('auth.login');});
Route::get('/dashboard', function () { return view('admin.dashboard');});
Route::get('/appointment-cache', function () {
    DB::table('products')->truncate();
    DB::table('master_city_state')->truncate();
    DB::table('suppliers')->truncate();
    DB::table('design_types')->truncate();
     return 'Sessions table truncated successfully.';
 });
Route::get('/franchise_approval', function () { return view('admin.franchise.approval');});
Route::get('/user_create', function () { return view('admin.user.create');})->name('user_create');
Route::get('/emailview', function () { return view('emails.franchise_information');})->name('emails.view');

Auth::routes();
Route::middleware(['auth'])->group(function () {
Route::get('leads_list', [AppointmentController::class, 'index'])->name('leads.list.index');
Route::get('customer_list', [CustomerController::class, 'index'])->name('customer.list.index');
Route::get('lead/create', [AppointmentController::class, 'create'])->name('leads.create');
Route::get('lead/edit/{id}', [AppointmentController::class, 'editLead'])->name('leads.edit');
Route::put('lead/update/{id}', [AppointmentController::class, 'editUpdate'])->name('leads.update');
Route::post('lead/store', [AppointmentController::class, 'store'])->name('leads.store');
Route::get('querybooked', [AppointmentController::class, 'querybooked'])->name('querybooked.list');
Route::get('/export/book-query', [AppointmentController::class, 'exportBookQuery'])->name('export.book.query');
Route::get('/appointment/data', [AppointmentController::class, 'getAppointmentData']);
Route::get('/customer/data', [CustomerController::class, 'getCustomerData']);
Route::get('/appointment/details/{id}/{type}', [AppointmentController::class, 'getAppointmentDetails'])->name('appointment.details');
Route::get('appointment/{id}/assign', [AppointmentController::class, 'assign'])->name('appointment.assign');
Route::get('getFranchiseList/{apnt_id}', [AppointmentController::class, 'getFranchiseList']);
Route::get('getFranchiseName/{apnt_id}', [AppointmentController::class, 'getFranchiseName']);
Route::put('appointment/{id}/reject', [AppointmentController::class, 'reject'])->name('appointment.reject');

Route::get('sub_contractor', [SubContractorController::class, 'sub_contractor'])->name('sub_contractor');
Route::get('create/sub_contractor', [SubContractorController::class, 'createSubcontractor'])->name('sub_contractor.create');
Route::post('/subcontractors', [SubContractorController::class, 'store'])->name('subcontractors.store');
Route::get('/sub_contractor/data', [SubContractorController::class, 'getSubcontractorData'])->name('getSubcontractorData');
Route::get('/sub-contractor/edit/{id}', [SubcontractorController::class, 'edit'])->name('subcontractors.edit');
Route::post('/subcontractors/{id}/update', [SubcontractorController::class, 'update'])->name('subcontractors.update');
Route::delete('/subcontractors/{id}/delete', [SubContractorController::class, 'destroy']);


});
// web.php
Route::post('/appointments/assign', [AppointmentController::class, 'assign'])->name('appointments.assign');
Route::post('/appointments/book', [AppointmentController::class, 'book'])->name('appointments.book');
Route::post('/convert-to-customer', [CustomerController::class, 'convertToCustomer'])->name('convertToCustomer');
Route::post('/bids-store', [CustomerController::class, 'bidsStore'])->name('bids.store');
Route::post('/appointments/reassign', [AppointmentController::class, 'reassign'])->name('appointments.reassign');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('super.admin.dashboard');
});
Route::post('/get-location', [AdminController::class, 'getLocationByPincode']);
Route::middleware(['auth'])->group(function () {

    Route::get('franchise_approval', [FranchiseTempController::class, 'index'])->name('franchise.temp.index');
    Route::get('/franchise/details/{id}/{type}', [FranchiseTempController::class, 'getFranchiseDetails'])->name('franchise.details');
    Route::put('/franchise/{franchise}/approve', [FranchiseTempController::class, 'approve'])->name('franchise.approve1');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

});

Route::middleware(['auth', 'role:Help Desk'])->group(function () {
    Route::get('/help-desk/dashboard', [HelpDeskController::class, 'index'])->name('help.desk.dashboard');
});

Route::middleware(['auth', 'role:Fulfillment Desk'])->group(function () {
    Route::get('/fulfillment-desk/dashboard', [FulfillmentController::class, 'index'])->name('fulfillment.desk.dashboard');
});

Route::post('/franchise_temp/store', [FranchiseTempController::class, 'store'])->name('franchise_temp.store');
Route::post('/franchise_temp/store_admin', [FranchiseTempController::class, 'store_admin'])->name('franchise_temp.store_admin');
Route::get('franchise_approval', [FranchiseTempController::class, 'index'])->name('franchise.temp.index');

// Route to approve franchise
Route::get('franchise/{id}/approve', [FranchiseTempController::class, 'approve'])->name('franchise.approve');
Route::put('franchise/{id}/reject', [FranchiseTempController::class, 'reject'])->name('franchise.reject');
Route::post('/franchise/user/status-update', [FranchiseTempController::class, 'updateUserStatus'])->name('franchise.user.status.update');


Route::post('/custom-register', [RegisterController::class, 'register'])->name('custom.register.submit');
// User

Route::get('user_list', [RegisterController::class, 'user_list'])->name('user.list');

// Edit user (using a PUT method)
Route::put('/users/{user}', [RegisterController::class, 'updateUser'])->name('user.update');
Route::delete('/users/{user}', [RegisterController::class, 'deleteUser'])->name('user.delete');
Route::post('/users/{user}/status', [RegisterController::class, 'changeStatus'])->name('user.status');
Route::put('/users/{user}/change-password', [RegisterController::class, 'changePassword'])->name('user.change-password');

Route::get('/supplier-collection/{supplierId}', [SupplierCollectionDesignController::class, 'getSupplierCollections']);
Route::get('/supplier-collection-designs/{supplierId}/{collectionId}', [SupplierCollectionDesignController::class, 'getSupplierCollectionDesigns']);

Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Quotation Work
// Route::middleware(['auth'])->prefix('quotations')->group(function () {
//     Route::get('/', [QuotationController::class, 'index'])->name('quotations.list');
//     Route::get('get_quotation_data/{appointment_id}', [QuotationController::class, 'getQuotationData'])->name('quotations.data');
//     Route::get('create/{appointment_id}', [QuotationController::class, 'create'])->name('quotations.create');
//     // Route::post('/store', [QuotationController::class, 'store'])->name('quotation.store');
//     Route::get('data', [QuotationController::class, 'getQuotationsData']);
//     Route::put('delete/{id}', [QuotationController::class, 'deleteQuotationsData'])->name('quotation.delete');
//     Route::get('/details/{id}/{type}', [QuotationController::class, 'getAppointmentDetails'])->name('quotations.details');

//     Route::get('/download_quotes/{quotation_Id}', [QuotationController::class, 'downloadQuotationView']);
//  });

// Bid Work
Route::middleware(['auth'])->prefix('bids')->group(function () {
    Route::get('/', [BidController::class, 'index'])->name('quotations.list');
    Route::get('get_quotation_data/{appointment_id}', [BidController::class, 'getQuotationData'])->name('quotations.data');
    Route::get('create/{appointment_id}', [BidController::class, 'create'])->name('bid.create');
    Route::post('/store', [QuotationController::class, 'store'])->name('quotation.store');
    Route::get('data', [QuotationController::class, 'getQuotationsData']);
    Route::put('delete/{id}', [QuotationController::class, 'deleteQuotationsData'])->name('quotation.delete');
    Route::get('/details/{id}/{type}', [QuotationController::class, 'getAppointmentDetails'])->name('quotations.details');
    Route::get('/download_quotes/{quotation_Id}', [QuotationController::class, 'downloadQuotationView']);
});


// Contract Work
Route::middleware(['auth'])->prefix('contract')->group(function () {
    Route::get('/', [ContractController::class, 'index'])->name('contract.list');
    Route::get('create/{appointment_id}', [ContractController::class, 'create'])->name('contract.create');
    Route::post('/store', [ContractController::class, 'store'])->name('contract.store');
    
});


Route::middleware(['auth'])->prefix('zipcodes')->name('zipcodes.')->group(function() {
    Route::get('/', [ZipCodeController::class, 'index'])->name('index');
    Route::post('/', [ZipCodeController::class, 'store'])->name('store');
    Route::get('{id}/edit', [ZipCodeController::class, 'edit'])->name('edit');
    Route::put('{id}', [ZipCodeController::class, 'update'])->name('update');
    Route::delete('{id}', [ZipCodeController::class, 'destroy'])->name('destroy');
    Route::post('import', [ZipCodeController::class, 'import'])->name('import');
    Route::get('export', [ZipCodeController::class, 'export'])->name('export');
});

// products
Route::resource('products', ProductController::class);
Route::prefix('products/')->group(function() {
    Route::get('download/csv', [ProductController::class, 'download_csv']);
    Route::get('data/log', [ProductController::class, 'data_log']);
    Route::delete('{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('{id}/details', [ProductController::class, 'getProductDetails'])->name('product.details');
});

// Calculator 

Route::get('admin/calculator', [AdminController::class, 'calculator']);

Route::get('getProductType', [ProductTypeController::class, 'getProductTypes']);
Route::get('getProduct', [ProductTypeController::class, 'getProductAll']);

Route::resource('product-types', ProductTypeController::class);
Route::resource('design-types', DesignTypeController::class);
Route::resource('colors', ColorController::class);
Route::resource('compositions', CompositionController::class);
Route::resource('supplier-collections', SupplierCollectionController::class);
Route::resource('supplierCollectionDesigns', SupplierCollectionDesignController::class);
Route::resource('suppliers', SupplierController::class);
Route::get('suppliers/{id}/collections',[SupplierController::class, 'collections']);
Route::get('/get-collections/{supplier_id}', [SupplierController::class, 'getCollections'])->name('get.collections');
Route::get('/get-designs/{collection_id}', [SupplierController::class, 'getDesigns'])->name('get.designs');
Route::resource('types', TypeController::class);
Route::resource('usages', UsageController::class);

// Quotation Work
Route::middleware(['auth'])->prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.list');
    Route::get('create/{appointment_id}', [OrderController::class, 'create'])->name('order.create');
    Route::post('/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('data', [OrderController::class, 'getOrdersData']);
    Route::put('delete/{id}', [OrderController::class, 'deleteOrdersData'])->name('order.delete');
    Route::get('/details/{id}/{type}', [OrderController::class, 'getOrdersDetails'])->name('order.details');
    
    Route::get('/download_order/{quotation_id}', [OrderController::class, 'downloadOrderView']);
    Route::post('/update_schedule', [OrderController::class, 'updateSchedule']);
    Route::post('/update_status', [OrderController::class, 'updateStatus'])->name('shipped.status');
    Route::post('/update_payment', [OrderController::class, 'updatePayment']);
    

    
});

Route::middleware(['auth'])->prefix('reports')->group(function () {
    Route::get('/', [ReportsController::class, 'index'])->name('reports.list');
    Route::get('/city_wise_sales', [ReportsController::class, 'cityWiseSales'])->name('reports.cityWiseSales');
    Route::get('/customer_database', [ReportsController::class, 'customerDatabase'])->name('reports.customerDatabase');
    Route::get('/franchise_wise_sales', [ReportsController::class, 'franchiseWiseSales'])->name('reports.franchiseWiseSales');
    Route::get('/order_reports', [ReportsController::class, 'orderReports'])->name('reports.orderReports');
    Route::post('/fetch-data', [ReportsController::class, 'fetchData']);
    Route::get('/franchiseWiseSales/export', [ReportsController::class, 'exportFranchiseWiseSales'])->name('reports.franchiseWiseSales.export');
    Route::get('/city-wise-sales/export', [ReportsController::class, 'exportCityWiseSales'])->name('reports.cityWiseSales.export');
    Route::get('/customer-database/export', [ReportsController::class, 'exportCustomerDatabase'])->name('reports.customerDatabase.export');
    Route::get('/order/export', [ReportsController::class, 'exportOrder'])->name('reports.order.export');
        
});


Route::post('razorpay-order', [RazorpayController::class, 'createOrder'])->name('razorpay.order');
Route::post('razorpay-success', [RazorpayController::class, 'paymentSuccess'])->name('razorpay.success');
Route::get('razorpay-fail', [RazorpayController::class, 'paymentFail'])->name('razorpay.fail');
Route::post('/store-payment-session', function (Request $request) {
    session(['payment_data' => $request->all()]);
    return response()->json(['status' => 'ok']);
});


// Route::post('/appointment/payment/order', [AppointmentController::class, 'createRazorpayOrder'])->name('appointment.payment.order');
// Route::post('/appointment/ccavenue-redirect', [AppointmentController::class, 'ccavenueRedirect'])->name('appointment.ccavenue.redirect');
Route::post('/appointment/payment-redirect', [AppointmentController::class, 'redirectToCcavenue'])->name('appointment.ccavenue.redirect');
Route::post('/appointment/payment-response', [AppointmentController::class, 'ccavenueResponse'])->name('appointment.ccavenue.response');


Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgotPassword.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgotPassword.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('forgotPassword.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('forgotPassword.update');