<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Result;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Store Answers and Calculate Result
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        foreach($request->answers as $answer) {
            $answer['is_correct'] = Answer::find($answer['answer'])->is_correct;
            Result::create([
                'answer_id' => $answer['answer'],
                "question_id" => $answer['question_id'],
                'user_id' => $request['user_id'],
                'is_correct' => $answer['is_correct']
            ]);
        }
        $results = Result::where('user_id', $request->user_id)
            ->selectRaw('SUM(is_correct) as correct_answers, COUNT(*) as total_answers')
            ->first();

        $correctAnswers = $results->correct_answers ?? 0;
        $totalAnswers = $results->total_answers ?? 0;
        $wrongAnswers = $totalAnswers - $correctAnswers;

        return response()->json([
            'user_id' => $request->user_id,
            'correct_answers' => $correctAnswers,
            'wrong_answers' => $wrongAnswers,
            'total_answers' => $totalAnswers
        ]);
    }
}
