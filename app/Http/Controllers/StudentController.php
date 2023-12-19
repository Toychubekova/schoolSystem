<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;

class StudentController extends Controller
{
    public function registerStudent(Request $request)
    {
        // Получаем данные из запроса
        $userData = $request->all();

        // Создаем нового пользователя
        $user = new User();
        $user->name = $userData['name'];
        $user->email = $userData['email'];
        $user->password = bcrypt($userData['password']);
        $user->role = 'student'; // Устанавливаем роль "студент"

        // Сохраняем пользователя
        $user->save();

        // Дополнительные действия после сохранения, если нужно

        return redirect()->route('student.home'); // Перенаправляем на страницу для студентов
    }
    public function index()
    {
        //$index = User::get();

        return view('student.index');
    }
}
