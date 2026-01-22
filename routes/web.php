<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;



Route::get('/',[ProjectController::class,'showJobview']);
Route::get('/jobs', [ProjectController::class, 'jobses']);
Route::get('/reg', [ProjectController::class, 'registration']);
Route::get('/logs', [ProjectController::class, 'login']);
Route::post('/inserts',[ProjectController::class,'inserted'])->name('inserts');
Route::post('/genotp',[ProjectController::class,'generateOTP'])->name('genotp');
Route::post('/verifyOtp',[ProjectController::class,'verifyOtp'])->name('verifyOtp');
Route::post('/passwords',[ProjectController::class,'passworded'])->name('passworded');
Route::post('/logvalidated',[ProjectController::class,'loginvalid']);
Route::get('/pro',[ProjectController::class,'viewProfile']);
Route::get('/change',[ProjectController::class,'changePasswordPage']);
Route::post('/changePassword',[ProjectController::class,'changePassword'])->name('changePassword');
Route::get('/edited',[ProjectController::class,'editProfile']);
Route::get('/changePasspage',[ProjectController::class,'changePass']);
Route::post('/changePassword',[ProjectController::class,'changesPassword'])->name('changePassword');
Route::post('/upda',[ProjectController::class,'updateProfile'])->name('upda');
Route::get('/forgotview',[ProjectController::class,'forgotView']);
Route::get('/jobViews',[ProjectController::class,'jobView']);
Route::post('/posts',[ProjectController::class,'postJob'])->name('posts');
Route::get('/showjobs',[ProjectController::class,'showJobs']);
Route::get('/viewJob/{jobsid}',[ProjectController::class,'viewJobPage'])->name('viewJob');
Route::get('/edit/{jobsid}',[ProjectController::class,'editJob'])->name('edit');
Route::post('/updated/{id}',[ProjectController::class,'updateJobs'])->name('updated');
Route::get('/dele/{jobsid}',[ProjectController::class,'delete'])->name('dele');
Route::post('/apply',[ProjectController::class,'applyJob'])->name('apply');
Route::post('/applyforjob', [ProjectController::class, 'applyforjob'])->name('applyforjob');
Route::get('/showjo',[ProjectController::class,'showsjobs'])->name('showjo');
Route::get('/deleteapplied/{id}',[ProjectController::class,'deleteappliedjob'])->name('deleteapplied');
Route::get('/respage/{id}',[ProjectController::class,'showresumePage']);
Route::get('/resume/{id}', [ProjectController::class, 'resumePage'])->name('resume');
Route::get('/editresume/{id}', [ProjectController::class, 'editResume'])->name('editresume');
Route::post('/updateResume', [ProjectController::class, 'updateResume'])->name('updateResume');
Route::get('/searche',[ProjectController::class,'search'])->name('searche');
Route::get('/logout',[ProjectController::class,'logout']);


