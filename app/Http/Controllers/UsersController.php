<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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

*/
public function create(Request $request)
{
    $user = new User;
  $user->name = $request->name;
  $user->number = $request->number;
  $user->email = $request->email;
  $user->code = $request->code;
  $user->password = Hash::make('doni' . $request->code)
  $product->save();
    return redirect()->route('admin.users')->with('success', 'Успешно добавлена.');
}
/*public function update(Request $request, User $user)
{
    $request->validate([
        'role' => 'required|in:client,employee,admin',
    ]);

    $user->update(['name' => $request->name]);
  $user->update(['number' => $request->number]);
  $user->update(['email' => $request->email]);
  $user->update(['code' => $request->code]);
  $user->update(['password' => $request->password]);

    return redirect()->route('products')->with('success', 'успешно обновлена.');
}
*/
}
