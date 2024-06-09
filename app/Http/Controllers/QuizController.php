<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function Termwind\renderUsing;

class QuizController extends Controller
{
    /**
     * Serves landing page
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        return view('quiz.start');
    }

    /**
     * Start quiz and store user info
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
       $user =  User::create(['name'=>$request->name]);
       return response()->json(['message'=>'User Saved Successfully','data'=>$user]);
    }
}
