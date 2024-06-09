<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

    Route::post('/start',[QuizController::class,'store']);
Route::get('/questions',[QuestionController::class,'index']);
Route::post('/answer',[AnswerController::class,'store']);
