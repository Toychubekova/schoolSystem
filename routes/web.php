<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\New;

use Illuminate\Support\Facades\DB;

// Маршрут для корневой страницы, отображает форму входа
Route::get('/', function () {
    return view('auth.login');
});

// Маршрут для создания новости
Route::get('/new/create', [NewsController::class, 'create'])->name('new.create');

// Группа маршрутов, требующих аутентификации и административных прав
Route::middleware(['auth', 'is_admin'])->group(function () {
    // Маршруты для управления пользователями
    Route::controller(UserController::class)->group(function(){
        Route::get('users', 'index');
        Route::get('users-export', 'export')->name('users.export');
        Route::post('users-import', 'import')->name('users.import');
    });

    // Административная панель для просмотра пользователей
    Route::get('/admin', function (Request $request) {
        $users = User::get();
        return view('admin.users', ['users' => $users]);
    })->name('admin.users');

    // Маршруты для создания студентов и учителей
    Route::get('/student/create', function () {
        return view('admin.studentCreate');
    });
    Route::post('/student/create',[UserController::class,'create'])->name('student.create');

    Route::get('/teacher/create', function () {
        return view('admin.teacherCreate');
    });
    Route::post('/teacher/create',[UserController::class,'create'])->name('teacher.create');

    // Удаление пользователей
    Route::delete('/users/{user}/delete',[UserController::class,'destroy'])->name('user.destroy');

    // Обновление пользователей
    Route::patch('/users/{user}/update', [UserController::class, 'update'])->name('user.update');

    // Маршруты для создания предметов
    Route::get('/subject/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/subject/create',[SubjectController::class,'createSubject'])->name('subject.createSubject');

    // Маршруты для создания расписания

    Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('schedule.create');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');

});

// Маршруты для предметов
Route::get('/subject/home', [SubjectController::class, 'index'])->name('subject.home');
Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subject.destroy');
Route::patch('/subjects/{subject}', [SubjectController::class, 'update'])->name('subject.update');

// Маршруты для расписания
Route::get('/schedule/home', [ScheduleController::class, 'index'])->name('schedule.home');
Route::get('/schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedule.edit');
Route::delete('/schedules/{schedule}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
Route::patch('/schedules/{schedule}', [ScheduleController::class, 'update'])->name('schedule.update');

// Маршруты для студентов и учителей
Route::get('/student/home', [StudentController::class, 'index'])->name('student.home');
Route::get('/teacher/teacher', [TeacherController::class, 'index'])->name('teacher.teacher');

// Маршрут для отображения профиля пользователя
Route::get('/dashboard', function (Request $request) {
    $user = $request->user();
    return view('dashboard', ['user' => $user]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Маршруты для управления профилем пользователя
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news/create', [NewsController::class, 'store'])->name('news.store');
Route::get('/new/home', [NewsController::class, 'index'])->name('new.home');


// Включение файла с маршрутами аутентификации
require __DIR__.'/auth.php';
