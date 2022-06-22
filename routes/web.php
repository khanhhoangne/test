<?php

use App\Http\Livewire\DashboardComponent;
use App\Http\Livewire\Categories\AdminCategoryComponent;
use App\Http\Livewire\Categories\AdminAddCategoryComponent;
use App\Http\Livewire\Categories\AdminEditCategoryComponent;
use App\Http\Livewire\Suppliers\AdminSupplierComponent;
use App\Http\Livewire\Suppliers\AdminAddSupplierComponent;
use App\Http\Livewire\Suppliers\AdminEditSupplierComponent;
use App\Http\Livewire\Products\AdminProductComponent;
use App\Http\Livewire\Products\AdminAddProductComponent;
use App\Http\Livewire\Products\AdminEditProductComponent;
use App\Http\Livewire\HomeSlider\AdminHomeSliderComponent;
use App\Http\Livewire\HomeSlider\AdminAddHomeSliderComponent;
use App\Http\Livewire\HomeSlider\AdminEditHomeSliderComponent;
use Illuminate\Support\Facades\Route;

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


// For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function (){
    Route::get('/', DashboardComponent::class)->name('dashboard');

    // 1. Categories
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    Route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');

    // 2. Suppliers
    Route::get('/admin/suppliers', AdminSupplierComponent::class)->name('admin.suppliers');
    Route::get('/admin/supplier/add', AdminAddSupplierComponent::class)->name('admin.addsupplier');
    Route::get('/admin/supplier/edit/{supplier_slug}', AdminEditSupplierComponent::class)->name('admin.editsupplier');

    // 3. Products 
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');

    //4. Home Slider
    Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slider_id}',AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');
});