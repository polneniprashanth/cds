<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\StudentRequestController;
use App\Http\Controllers\CertificatesImportController;
use App\Http\Controllers\EmailConfigurationController;
use App\Http\Controllers\CertificateGeneratorController;

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
    return view('student.studenthome');
});

Route::get('/verify',function() {
    return view('student.verifycode');
});

Route::get('/request',function(){
    return view('student.request');
});

Route::get('/certificate/verify', [VerifyController::class, 'verify'])->name('verifycode');
Route::get('/certificate/verify/{certificate}',[VerifyController::class, 'show'])->name('showverify');
Route::get('/certificate/download/{certificate}',[VerifyController::class, 'download'])->name('download');

Route::post('request/store', [StudentRequestController::class, 'store'])->name('requeststore');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('request/delete/{id}', [StudentRequestController::class, 'delete'])->name('deleterequest');

Route::get('/admin/add/student', [HomeController::class, 'addstudent']);
Route::post('students/store', [StudentsController::class, 'store'])->name('studentstore');

Route::get('/admin/search/student', [HomeController::class, 'searchstudent']);
Route::get('students/show', [StudentsController::class, 'show'])->name('studentshow');

Route::get('/admin/edit/student/{student}', [StudentsController::class, 'edit'])->name('studentedit');
Route::put('students/update/{student}', [StudentsController::class, 'update'])->name('studentupdate');

Route::get('/admin/add/course', [HomeController::class, 'addcourse']);
Route::post('course/store', [CourseController::class, 'store'])->name('coursestore');

Route::get('/admin/search/course', [HomeController::class, 'searchcourse']);
Route::get('course/show', [CourseController::class, 'show'])->name('courseshow');

Route::get('/admin/edit/course/{course}', [CourseController::class, 'edit'])->name('courseedit');
Route::put('course/update/{course}', [CourseController::class, 'update'])->name('courseupdate');

Route::get('/admin/sample',[CertificatesImportController::class, 'download'])->name('sampledownload');
Route::get('/admin/add/bulk', [CertificatesImportController::class, 'show']);
Route::post('/admin/store/cert', [CertificatesImportController::class, 'store'])->name('certstore');
Route::get('/cert/generate', [CertificatesImportController::class, 'generate'])->name('generate');
Route::get('/admin/sendmail', [CertificatesImportController::class, 'showcert']);
Route::get('certshow', [CertificatesImportController::class, 'certshow'])->name('certshow');

Route::get('/admin/viewcertificate',[CertificateGeneratorController::class, 'view']);
Route::post('admin/viewcertificate/{id}', [CertificateGeneratorController::class, 'delete'])->name('certdelete');
Route::get('/admin/generatecertificate', [CertificateGeneratorController::class, 'show']);
Route::get('/admin/generatecertificate/{certificate}', [CertificateGeneratorController::class, 'edit'])->name('certedit');
Route::post('/admin/createcertificate/{certificate}', [CertificateGeneratorController::class, 'create'])->name('certcreate');

Route::get('/admin/settings', [HomeController::class, 'settings']);
Route::post('/save/settings', [EmailConfigurationController::class, 'createconfiguration'])->name('savesettings');

Route::group(['middleware' => [ 'mail' ]], function () {
    Route::post('/sendmail/all', [CertificatesImportController::class, 'sendall'])->name('sendall');
    Route::post('/sendmail/{certificate}', [CertificatesImportController::class, 'composemail'])->name('sendmail'); 
});