<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function changeRoleToEmployee(User $user)
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
}
public function updateRole(Request $request, User $user)
{
    /*$request->validate([
        'role' => 'required|in:client,employee,admin',
    ]);*/

    $user->update(['code' => $request->code]);
    $user->update(['role' => $request->role]);

    return redirect()->route('admin.users')->with('success', 'Роль пользователя успешно обновлена.');
}

}
