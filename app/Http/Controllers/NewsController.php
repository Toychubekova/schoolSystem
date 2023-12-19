<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
        public function index()
    {
        $news = News::with('student.user')->get();
        return view('new.index', ['news' => $news]);
    }



    public function create()
    {
        $students = DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->select('users.name as student_name', 'students.id as student_id')
            ->get();

        return view('admin.newsCreate',['students' => $students]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'student_id' => 'required|exists:students,id',
        ]);

        News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'student_id' => $request->input('student_id'),
        ]);

        return redirect()->route('new.home')->with('success', 'Новость успешно добавлена');
    }

    // Остальные методы оставляются без изменений
    // ...
}
