<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;


class SubjectController extends Controller
{
    public function index()
    {


        $subjects = DB::table('subjects')
            ->join('teachers', 'teachers.id', '=', 'subjects.teacher_id')
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->select('subjects.id as subject_id', 'subjects.name as subject_name', 'users.name as teacher_name')
            ->get();

        return view('subject.index', ['subjects' => $subjects]);
    }

    public function create()
    {

        $teachers = DB::table('users')
            ->join('teachers', 'users.id', '=', 'teachers.user_id')
            ->select('users.name as teacher_name', 'teachers.id as teacher_id')
            ->get();
        return view('admin.subjectCreate', ['teachers' => $teachers]);
    }

    public function createSubject(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'teacher_id' => 'required|exists:teachers,id'
        ]);

        Subject::create([
            'name' => $request->input('name'),
            'teacher_id' => $request->input('teacher_id'),
        ]);

        return redirect()->route('subject.home')->with('success', 'Предмет успешно добавлен');
    }

    public function edit($subject_id)
    {
        $subject = Subject::findOrFail($subject_id);
       $teachers = DB::table('users')
            ->join('teachers', 'users.id', '=', 'teachers.user_id')
            ->select('users.name as teacher_name', 'teachers.id as teacher_id')
            ->get();

        return view('admin.subjectEdit', compact('subject', 'teachers'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'teacher_id' => 'required|exists:teachers,id'
        ]);

        $subject->update([
            'name' => $request->input('name'),
            'teacher_id' => $request->input('teacher_id'),
        ]);

        return redirect()->route('subject.home')->with('success', 'Предмет успешно обновлен');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subject.home')->with('success', 'Предмет успешно удален');
    }
}
