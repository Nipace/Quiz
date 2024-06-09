<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Generates List of questions in random order
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $questions = Question::with('answers')
            ->inRandomOrder()
            ->paginate(5);

        return response()->json(['message' => 'Questions retrieved successfully', 'data' => $questions]);
    }

}
