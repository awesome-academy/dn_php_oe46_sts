<?php

use App\Http\Controllers\ChartDataController;
use App\Http\Controllers\CommentReport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseTraineeController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReportLessonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('detailReport')->middleware(['auth']);
Route::get('language/{language}', [LanguageController::class, 'index'])->name('language');
Auth::routes();
/* CourseController****** */
Route::resource('listCourse', CourseController::class);
Route::get('/search', [CourseController::class, 'search'])->name('search');
Route::get('/homeTrainee/{id}', [CourseTraineeController::class, 'homeTrainee'])->name('homeTrainee');
Route::get('/finishCourse/{id}', [CourseController::class, 'finishCourse'])->name('finishCourse');
/**Subject Controller */
Route::resource('listSubject', SubjectController::class);
Route::get('/listCourse/detailSubject/{id}/{dateStart}', [SubjectController::class, 'showSub'])->name('showSbj');
/* Report Lesson Controller*/
Route::resource('reportLesson', ReportLessonController::class);
Route::post('report/uploadImg', [ReportLessonController::class, 'uploadImageToDir'])->name('reportLesson.upload');
Route::get('report/check', [ReportLessonController::class, 'checkPass'])->name('reportLesson.checkPass');
/* User Controller*/
Route::resource('user', UserController::class);
Route::post('createUser', [UserController::class, 'createUser'])->name('userCreateUser');
Route::delete('/kick-user/{id}/{courseId}', [CourseController::class, 'kickUser'])->name('kickUser');
Route::get('/searchUser', [UserController::class, 'search'])->name('searchUser');
/* Lesson Controller*/
Route::resource('lesson', LessonController::class);
/*ReportDaijly*/
Route::resource('reportDaily', DailyReportController::class);
Route::get('historyReport', [DailyReportController::class, 'historyReport'])->name('historyReport');
/**Comment Controller */
Route::resource('comments', CommentReport::class);
/**Chhart */
Route::get('/getCourseChart', [ChartDataController::class, 'getMonthlyPostData']);
Route::get('/chooseYear', [ChartDataController::class, 'getMonthlyPostData']);
Route::get('/dashboard', [ChartDataController::class, 'index'])->name('DashBoard');
