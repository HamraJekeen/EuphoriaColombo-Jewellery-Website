<?php
use App\Livewire\HomePage;
use App\Livewire\CategoriesPage;
use App\Livewire\ProductPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\CartPage;
use App\Livewire\CheckoutPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\MyOrderDetailPage;

use App\Livewire\SuccessPage;
use App\Livewire\CancelPage;

use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ForgotPasswordPage;
use App\Livewire\Auth\ResetPasswordPage;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdminRole;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Firebase\ContactController;

// This route will handle showing the form (GET request)
Route::get('/contacts', [ContactController::class, 'showForm'])->name('firebase.contact.index');
Route::get('/inquiries', [ContactController::class, 'viewInquiries'])->name('contacts.view');
//Route::get('/contacts/view', [ContactController::class, 'showInquiry'])->name('contacts.view');
Route::get('/contacts/edit/{id}', [ContactController::class, 'edit']);
Route::put('/contacts/update/{id}', [ContactController::class, 'update'])->name('contacts.update');
Route::GET('/contacts/delete/{id}', [ContactController::class, 'destroy']);

// This route will handle form submission (POST request)
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
// Route::get('/',HomePage::class);

// Route::get('/categories',CategoriesPage::class);
// Route::get('/products',ProductPage::class);
// Route::get('/products/{slug}',ProductDetailPage::class);
// Route::get('/cart',CartPage::class);


//Route::get('/login',LoginPage::class)->name('login');




// Route::middleware('guest')->group(function(){
//     Route::get('/login',Login::class)->name('login');
//     Route::get('/register',Register::class);
//     Route::get('/forgot',ForgotPassword::class)->name('password.request');
//     Route::get('/reset',ResetPassword::class);

// });

// Route::middleware('auth')->group(function(){
//     Route::get('/logout',function(){
//         auth()->logout();
//         return redirect('/');
//     });
//     Route::get('/checkout',CheckoutPage::class);
//     Route::get('/my-orders',MyOrdersPage::class);
//     Route::get('/my-orders/{order}', MyOrderDetailPage::class)->name('my-orders.show');
//     Route::get('/success',SuccessPage::class)->name('success');
//     Route::get('/cancel',CancelPage::class)->name('cancel');
// });
//Route::get('/login',LoginPage::class);
// Route::get('/register',RegisterPage::class);
// Route::get('/forgot',ForgotPasswordPage::class);
// Route::get('/reset',ResetPasswordPage::class);



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


// // Public/Guest Routes
// Route::get('/',HomePage::class);
// Route::get('/categories',CategoriesPage::class);
// Route::get('/products',ProductPage::class);
// Route::get('/products/{slug}',ProductDetailPage::class);
// Route::get('/cart',CartPage::class);


// // Guest-only routes (accessible only when NOT logged in)
// Route::middleware('guest')->group(function () {
//     // Jetstream handles these routes automatically:
//     // - Login
//     // - Register
//     // - Password Reset
// });

// Route::middleware('auth')->group(function(){
//     Route::get('/logout',function(){
//         auth()->logout();
//         return redirect('/');
//     });
//     Route::get('/checkout',CheckoutPage::class);
//     Route::get('/my-orders',MyOrdersPage::class);
//     Route::get('/my-orders/{order}', MyOrderDetailPage::class)->name('my-orders.show');
//     Route::get('/success',SuccessPage::class)->name('success');
//     Route::get('/cancel',CancelPage::class)->name('cancel');
// });


// // Admin routes (using Filament)
// Route::prefix('admin')->name('admin.')->middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
//     'can:access-admin'  // You'll need to create this gate
// ])->group(function () {
//     // Filament will handle the admin routes automatically
// });





// Route::get('/',HomePage::class);

// Route::get('/categories',CategoriesPage::class);
// Route::get('/products',ProductPage::class);
// Route::get('/products/{slug}',ProductDetailPage::class);
// Route::get('/cart',CartPage::class);


//Route::get('/login',LoginPage::class)->name('login');




// Route::middleware('guest')->group(function(){
//     Route::get('/login',Login::class)->name('login');
//     Route::get('/register',Register::class);
//     Route::get('/forgot',ForgotPassword::class)->name('password.request');
//     Route::get('/reset',ResetPassword::class);

// });

// Route::middleware('auth')->group(function(){
//     Route::get('/logout',function(){
//         auth()->logout();
//         return redirect('/');
//     });
//     Route::get('/checkout',CheckoutPage::class);
//     Route::get('/my-orders',MyOrdersPage::class);
//     Route::get('/my-orders/{order}', MyOrderDetailPage::class)->name('my-orders.show');
//     Route::get('/success',SuccessPage::class)->name('success');
//     Route::get('/cancel',CancelPage::class)->name('cancel');
// });
//Route::get('/login',LoginPage::class);
// Route::get('/register',RegisterPage::class);
// Route::get('/forgot',ForgotPasswordPage::class);
// Route::get('/reset',ResetPasswordPage::class);



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


// Public/Guest Routes
Route::get('/',HomePage::class);
Route::get('/categories',CategoriesPage::class);
Route::get('/products',ProductPage::class);
Route::get('/products/{slug}',ProductDetailPage::class);
Route::get('/cart',CartPage::class);


// Guest-only routes (accessible only when NOT logged in)
Route::middleware('guest')->group(function () {
    // Jetstream handles these routes automatically:
    // - Login
    // - Register
    // - Password Reset
    
});

Route::middleware('auth')->group(function(){
    Route::get('/logout',function(){
        auth()->logout();
        return redirect('/');
    });
    Route::get('/checkout',CheckoutPage::class);
    Route::get('/my-orders',MyOrdersPage::class);
    Route::get('/my-orders/{order_id}', MyOrderDetailPage::class)->name('my-orders.show');
    Route::get('/success',SuccessPage::class)->name('success');
    Route::get('/cancel',CancelPage::class)->name('cancel');
});


// Admin routes (using Filament)
Route::prefix('admin')->name('admin.')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'can:access-admin'  // You'll need to create this gate
])->group(function () {
    // Filament will handle the admin routes automatically
});
Route::middleware(CheckAdminRole::class)->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});