<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ChequeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DamageItemsController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SuperMarketPosController;
use Illuminate\Support\Facades\Route;


Route::get('/',[CashierController::class,'login'])->name('cashier.login');
Route::post('/',[CashierController::class,'login_check'])->name('cashier.login-check');

//Route::prefix('super_market_pos')->group(function () {
    Route::prefix('owner')->group(function () {
        Route::get('/login', [OwnerController::class, 'login'])->name('login');
        Route::post('/login-check', [OwnerController::class, 'login_check'])->name('owner.login.check');
       Route::get('/logout', [OwnerController::class, 'logout'])->name('owner.logout');

Route::middleware(['auth:owner'])->group(function () {
        Route::get('/', [OwnerController::class, 'index'])->name('owner.dashboard');
        Route::post('/create', [OwnerController::class, 'create'])->name('owner.create');

        Route::get('/profile', [OwnerController::class, 'profile'])->name('owner.profile');
        Route::get('/receipt', [OwnerController::class, 'receipt'])->name('owner.receipt');
        Route::get('/issued_bills', [OwnerController::class, 'issued_bills'])->name('owner.issued_bills');

        Route::prefix('cashier')->group(function () {
            Route::get('/', [CashierController::class, 'index'])->name('owner-cashier-index');
            Route::post('/store', [CashierController::class, 'create'])->name('owner-cashier-create');
            Route::post('/', [CashierController::class, 'store'])->name('owner-cashier-store');
            Route::get('/{id}', [CashierController::class, 'edit'])->name('owner-cashier-edit');
            Route::post('/{id}', [CashierController::class, 'update'])->name('owner-cashier-update');
            Route::get('/delete/{id}', [CashierController::class, 'destroy'])->name('owner-cashier-delete');
            Route::get('/cashier/add', [CashierController::class, 'create'])->name('owner-cashier-add');
        });


        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/', [ProductController::class, 'store'])->name('product.store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::post('/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
            Route::post('/search',[ProductController::class,'searchProduct'])->name('product.search');

//            **** product type ****
            Route::get('/type', [ProductTypeController::class, 'type_create'])->name('product.type');
            Route::get('/type_create', [ProductTypeController::class, 'store'])->name('product.type_create');
            Route::get('/type_list', [ProductTypeController::class, 'index'])->name('product-type.index');
            Route::get('/type_delete/{id}', [ProductTypeController::class, 'destroy'])->name('product-type.delete');

        });

        Route::prefix('category')->group(function () {
            Route::get('/', [ProductController::class, 'category_index'])->name('category.index');
            Route::post('/', [ProductController::class, 'category_store'])->name('category.store');
            Route::post('/{id}', [ProductController::class, 'category_update'])->name('category.update');
            Route::get('/delete/{id}', [ProductController::class, 'category_delete'])->name('category.delete');
            Route::get('/category-add', [ProductController::class, 'category_create'])->name('category.create');
            Route::get('/category-edit/{$id}', [ProductController::class, 'category_edit'])->name('category.edit');

        });

        Route::prefix('subcategory')->group(function () {
            Route::get('/', [ProductController::class, 'subcategory_index'])->name('sub_category.index');
            Route::get('/Sub_category-add', [ProductController::class, 'Sub_category_create'])->name('Sub_category.create');
            Route::get('/Sub_category-edit/{$id}', [ProductController::class, 'Sub_category_edit'])->name('Sub_category.edit');
            Route::post('/', [ProductController::class, 'subcategory_store'])->name('subcategory.store');
            Route::post('/{id}', [ProductController::class, 'subcategory_update'])->name('subcategory.update');
            Route::get('/{id}', [ProductController::class, 'subcategory_show'])->name('subcategory.show');
            Route::get('/delete/{id}', [ProductController::class, 'subcategory_delete'])->name('subcategory.delete');
        });

        Route::prefix('brand')->group(function () {
            Route::get('/', [ProductController::class, 'brand_index'])->name('brand.index');
            Route::get('/create', [ProductController::class, 'brand_create'])->name('brand.create');
            Route::post('/', [ProductController::class, 'brand_store'])->name('brand.store');
            Route::get('/edit/{id}', [ProductController::class, 'brand_edit'])->name('brand.edit');
            Route::post('/{id}', [ProductController::class, 'brand_update'])->name('brand.update');
            Route::get('/delete/{id}', [ProductController::class, 'brand_delete'])->name('brand.delete');

        });

        Route::prefix('stock')->group(function () {
            Route::get('/', [StockController::class, 'index'])->name('stock.index');
            Route::get('/add',[StockController::class,'create'])->name('stock.create');
            Route::get('/report', [StockController::class, 'report'])->name('stock.report');
            Route::post('/', [StockController::class, 'store'])->name('stock.store');
            Route::get('/{id}',[StockController::class,'edit'])->name('stock.edit');
            Route::post('/{id}', [StockController::class, 'update'])->name('stock.update');
//                Route::get('/{id}', [StockController::class, 'show'])->name('stock.show');
            Route::get('/delete/{id}', [StockController::class, 'delete'])->name('stock.delete');
        });

        Route::prefix('order')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('order.index');
            Route::post('/', [OrderController::class, 'store'])->name('order.store');
            Route::post('/{id}', [OrderController::class, 'update'])->name('order.update');
            Route::get('/{id}', [OrderController::class, 'show'])->name('order.show');
            Route::get('/delete/{id}', [OrderController::class, 'destroy'])->name('order.delete');
        });

        Route::prefix('damage_items')->group(function () {
            Route::get('/', [DamageItemsController::class, 'index'])->name('damage_items.index');
            Route::get('/add', [DamageItemsController::class, 'create'])->name('damage_items.create');
            Route::get('/update', [DamageItemsController::class, 'update'])->name('damage_items.update');
            Route::get('/report', [DamageItemsController::class, 'report'])->name('damage_items.report');

        });

        Route::prefix('expenses')->group(function () {
            Route::get('/add_expenses', [OwnerController::class, 'add_expenses'])->name('owner.add_expenses');
            Route::post('/expenses/store', [OwnerController::class, 'store_expenses'])->name('expenses.store');
            Route::get('/edit_expenses/{id}', [OwnerController::class, 'edit_expenses'])->name('owner.edit_expenses');
            Route::put('/expenses/{id}', [OwnerController::class, 'update_expenses'])->name('owner.update_expenses');
            Route::get('/expenses_list', [OwnerController::class, 'expenses_list'])->name('owner.expenses_list');
            Route::delete('/expenses/{id}', [OwnerController::class, 'destroy_expenses'])->name('owner.delete_expenses');
            Route::get('/report', [OwnerController::class, 'report'])->name('expenses.report');
        });

        Route::prefix('cheque')->group(function () {
            Route::get('/', [ChequeController::class, 'index'])->name('cheque.index');
            Route::get('/add', [ChequeController::class, 'create'])->name('cheque.create');
            Route::post('/cheque/store', [ChequeController::class, 'store'])->name('cheque.store');
            Route::get('/cheques/{id}/edit', [ChequeController::class, 'edit'])->name('cheque.edit');
            Route::put('/cheques/{id}', [ChequeController::class, 'update'])->name('cheque.update');
            Route::delete('/cheques/{id}', [ChequeController::class, 'destroy'])->name('cheque.destroy');
        });

        Route::prefix('sale')->group(function () {
            Route::get('/profit', [OwnerController::class, 'profit'])->name('owner.profit');
            Route::get('/return_items', [OwnerController::class, 'return_items'])->name('owner.return_items');
            Route::get('/sale', [OwnerController::class, 'sale'])->name('owner.sale');

        });

        Route::prefix('admin')->group(function (){
            Route::get('/',[AdminController::class,'index'])->name('admin.index');
            Route::get('/add',[AdminController::class,'create'])->name('admin.add');
            Route::post('/',[AdminController::class,'store'])->name('admin.store');
            Route::get('/{id}',[AdminController::class,'edit'])->name('admin.edit');
            Route::post('/update/{id}',[AdminController::class,'update'])->name('admin.update');
            Route::post('/delete/{id}',[AdminController::class,'delete'])->name('admin.delete');
        });

        Route::prefix('manager')->group(function (){
            Route::get('/',[ManagerController::class,'index'])->name('manager.index');
            Route::get('/add',[ManagerController::class,'create'])->name('manager.create');
            Route::post('/',[ManagerController::class,'store'])->name('manager.store');
            Route::get('/{id}',[ManagerController::class,'edit'])->name('manager.edit');
            Route::post('/{id}',[ManagerController::class,'update'])->name('manager.update');
            Route::get('/delete/{id}',[ManagerController::class,'delete'])->name('manager.delete');


        });

        Route::prefix('customer')->group(function (){
            Route::get('/',[CustomerController::class, 'index'])->name('customer.index');
            Route::get('/add', [CustomerController::class, 'create'])->name('owner.add_customer');
            Route::post('/',[CustomerController::class,'store'])->name('customer.store');
            Route::get('/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
            Route::post('/{id}', [CustomerController::class, 'update'])->name('customer.update');
            Route::post('/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');

        });

    });
    });

//  Route::middleware(['auth:cashier'])->group(function (){
      Route::prefix('pos')->group(function () {
          Route::get('/logout',[CashierController::class,'logout'])->name('cashier.logout');
        Route::get('/', [SuperMarketPosController::class, 'dashboard'])->name('pos.dashboard');
        Route::get('/damage_items', [SuperMarketPosController::class, 'damage_items'])->name('pos.damage_items');
        Route::get('/add_damage_items', [SuperMarketPosController::class, 'add_damage_items'])->name('pos.add_damage_items');
        Route::get('/edit_damage_items', [SuperMarketPosController::class, 'edit_damage_items'])->name('pos.edit_damage_items');
        Route::get('/stock', [SuperMarketPosController::class, 'stock'])->name('pos.stock');
        Route::get('/reports', [SuperMarketPosController::class, 'reports'])->name('pos.reports');
        Route::get('/members', [SuperMarketPosController::class, 'members'])->name('pos.members');
        Route::post('/product/scan', [SuperMarketPosController::class, 'productScan'])->name('product.scan');
        Route::post('/order/submit', [OrderController::class, 'orderSubmit'])->name('order.save');
        Route::post('/get-member', [CustomerController::class, 'getMember'])->name('get.member');
        Route::get('/cheque_list', [SuperMarketPosController::class, 'cheque_list'])->name('pos.cheque_list');
        Route::get('/add_cheque', [SuperMarketPosController::class, 'add_cheque'])->name('pos.add_cheque');
        Route::get('/view_cheque', [SuperMarketPosController::class, 'view_cheque'])->name('pos.view_cheque');
        Route::get('/edit_cheque', [SuperMarketPosController::class, 'edit_cheque'])->name('pos.edit_cheque');

    });
  });
});
//});



