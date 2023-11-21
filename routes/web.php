<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/contacts',function(){
    return view('contact');
})->name('contacts');

Route::get('/admin', function (Request $request) {
    $users = User::get();

    return view('admin.users', [
        'users' => $users
    ]);
})->middleware(['auth', 'is_admin'])->name('admin.users');

Route::get('/clients', function (Request $request) {
    return view('dashboard');
})->middleware(['auth', 'is_admin_or_employee']);

/*Route::get('/admin/user/{id}/edit_role', function (string $id) {
    $user = User::find($id);

    return view('admin.edit_role', [
        'user'=>$user
    ]);
});*/


Route::middleware(['auth', 'is_admin'])->group(function () {
    // Маршруты для изменения ролей пользователей
    /*Route::patch('/users/{user}/changeRoleToEmployee', [RoleController::class, 'changeRoleToEmployee'])
        ->name('users.changeRoleToEmployee');

    Route::patch('/users/{user}/changeRoleToAdmin', [RoleController::class, 'changeRoleToAdmin'])
        ->name('users.changeRoleToAdmin');*/
     Route::patch('/users/{user}/updateRole', [RoleController::class, 'updateRole'])
        ->name('users.updateRole');

});
/*Route::post('/user/create', [UserController::class, 'create'])
        ->name('user.create');*/

Route::post('/user/create', function (Request $request){

    $user = new User;
  $user->name = $request->name;
  $user->number = $request->number;
  $user->email = $request->email;
  $user->code = $request->code;
  $user->password = Hash::make('doni' . $request->code);
  $user->save();
    return redirect()->route('admin.users')->with('success', 'Успешно добавлена.');
})->middleware(['auth', 'is_admin_or_employee'])->name('user.create');

Route::get('/dashboard', function (Request $request) {
    $user=$request->user();
    $products=Product::where('kod',$user->code)->get();
    return view('dashboard',[
        'products'=>$products,'user'=>$user
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/details/product/{id}', function (String $id) {
    $product=Product::find($id);
    return view('products.detailsProduct',[
        'product'=>$product
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'is_admin_or_employee'])->group(function () {
    Route::get('/products', function () {
  $products = Product::orderBy('created_at', 'asc')->get();

  return view('products.product', [
    'products' => $products
  ]);
})->name('products');

Route::post('/product', function (Request $request) {
  /*$validator = Validator::make($request->all(), [
    'name' => 'required|max:255',
  ]);

  if ($validator->fails()) {
    return redirect('/')
      ->withInput()
      ->withErrors($validator);
  }*/

  $product = new Product;
  $product->trek_kod = $request->trek_kod;
  $product->kod = $request->kod;
  $product->weight = $request->weight;
  $product->receipt_A = $request->receipt_A;
  $product->dispatch_A = $request->dispatch_A;
  $product->receipt_B = $request->receipt_B;
  $product->issue = $request->issue;
  $product->price = $request->price;
  $product->save();

  return redirect('/products');
});
Route::patch('/product/{product}/update', [ProductController::class, 'update'])->name('products.update');
/*Route::patch('/product/{product}/update', function (Request $request,Product $product) {
  $product->update(['trek_kod' => $request->trek_kod]);
  $product->update(['kod' => $request->kod]);
  $product->update(['weight' => $request->weight]);
  $product->update(['receipt_A' => $request->receipt_A]);
  $product->update(['dispatch_A' => $request->dispatch_A]);
  $product->update(['receipt_B' => $request->receipt_B]);
  $product->update(['issue' => $request->issue]);

  return redirect('/products');
})->middleware(['auth', 'is_admin_or_employee'])->name('products.update');*/

Route::delete('/product/{product}/delete', function (Product $product) {
  $product->delete();

  return redirect('/products');
})->name('products.delete');
});

require __DIR__.'/auth.php';
