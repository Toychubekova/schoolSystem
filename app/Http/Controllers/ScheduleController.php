<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = DB::table('schedules')
            ->join('teachers', 'teachers.id', '=', 'schedules.teacher_id')
            ->join('users as teacher_user', 'teacher_user.id', '=', 'teachers.user_id')
            ->join('subjects', 'subjects.id', '=', 'schedules.subject_id')
            ->join('students', 'students.id', '=', 'schedules.student_id')
            ->join('users as student_user', 'student_user.id', '=', 'students.user_id')
            ->select(
                'schedules.id as schedule_id',
                'subjects.name as subject_name',
                'teacher_user.name as teacher_name',
                'student_user.name as student_name',
                'schedules.date',
                'schedules.start_time',
                'schedules.end_time'
            )
            ->get();
        return view('schedule.index', ['schedules' => $schedules]);
    }


   public function create()
    {
        // Отображение формы для создания нового расписания
        $subjects = Subject::all();
        $teachers = DB::table('users')
            ->join('teachers', 'users.id', '=', 'teachers.user_id')
            ->select('users.name as teacher_name', 'teachers.id as teacher_id')
            ->get();
        $students = DB::table('users')
            ->join('students', 'users.id', '=', 'students.user_id')
            ->select('users.name as student_name', 'students.id as student_id')
            ->get();

        return view('admin.scheduleCreate', [
            'subjects' => $subjects,
            'teachers' => $teachers,
            'students' => $students
        ]);
    }




    public function store(Request $request)
    {
        // Валидация данных, полученных из запроса
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'teacher_id' => 'required|exists:teachers,id',
            'student_id' => 'required|exists:students,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        // Создание нового расписания и сохранение в базе данных
        Schedule::create([
            'subject_id' => $request->input('subject_id'),
            'teacher_id' => $request->input('teacher_id'),
            'student_id' => $request->input('student_id'),
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
        ]);

        // Перенаправление пользователя на страницу со списком расписаний с сообщением об успехе
        return redirect()->route('schedule.home')->with('success', 'Расписание успешно добавлено');
    }
}
