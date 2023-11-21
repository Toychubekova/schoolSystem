<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /*public function changeRoleToEmployee(User $user)
{
    $user->update(['role' => 'employee']);
    return redirect()->route('admin.users')->with('success', 'Роль пользователя успешно обновлена.');
}

public function editRole(User $user)
{
    return view('users.edit_role', ['user' => $user]);
}


public function changeRoleToAdmin(User $user)
{
    $user->update(['role' => 'admin']);
    return redirect()->route('admin.users')->with('success', 'Роль пользователя успешно обновлена.');
}*/
public function update(Request $request, Product $product)
{
    /*$request->validate([
        'role' => 'required|in:client,employee,admin',
    ]);*/

    $product->update(['trek_kod' => $request->trek_kod]);
  $product->update(['kod' => $request->kod]);
  $product->update(['weight' => $request->weight]);
  $product->update(['receipt_A' => $request->receipt_A]);
  $product->update(['dispatch_A' => $request->dispatch_A]);
  $product->update(['receipt_B' => $request->receipt_B]);
  $product->update(['issue' => $request->issue]);
  $product->update(['price' => $request->price]);

    return redirect()->route('products')->with('success', 'успешно обновлена.');
}

}
