<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Hash;
class UserController extends Controller
{
   public function index()
    {
        $users = User::get();

        return view('users', compact('users'));
    }




public function create(Request $request)
{
    try {
        DB::beginTransaction();

        $user = new User;
        $user->name = $request->name;
        $user->adress = $request->adress;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->role = $request->role;

        if (empty($request->password)) {
            $user->password = Hash::make($request->name);
        } else {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if ($request->role == "teacher") {
            $teacher = new Teacher;
            $teacher->user_id = $user->id;
            $teacher->save();
        } elseif ($request->role == "student") {
            $student = new Student;
            $student->user_id = $user->id;
            $student->save();
        }

        DB::commit();

        return redirect()->route('admin.users')->with('success', 'Успешно добавлена.');
    } catch (\Exception $e) {
        DB::rollback();

        return redirect()->route('admin.users')->with('error', $e);
    }
}

public function update(Request $request, User $user)
{


  $user->update(['name' => $request->name]);
  $user->update(['adress' => $request->adress]);
  $user->update(['email' => $request->email]);
  $user->update(['gender' => $request->gender]);
  $user->update(['role' => $request->role]);
  if ($request->password!=null){
  $user->update(['password' => $request->password]);
}
    return redirect()->route('admin.users')->with('success', 'успешно обновлена.');
}

public function destroy(User $user){
    $user->delete();
    return redirect()->route('admin.users')->with('success', 'успешно обновлена.');
}

}
