<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\QuestionCategory;

class QuestionsController extends Controller
{
    public function index(Request $request)
    {
        // if (!$request->expectsJson()) {
        //     return view('faq');
        // }

        $query = Question::query()->with('categories');

        if ($request->filled('filter')) {
            $query = $query->where(function ($query) use ($request) {
                return $query->where('title', 'like', '%' . $request['filter'] . '%')
                    ->orWhere('slug', 'like', '%' . $request['filter'] . '%')
                    ->orWhere('content', 'like', '%' . $request['filter'] . '%');
            });
        }

        if ($request->filled('category')) {
            $query = $query->whereHas('categories', function ($query) use ($request) {
                $query->where('slug', '=', $request['category']);
            });
        }

        return response()->json(['questions' => $query->get()]);
    }

    public function get(Request $request)
    {
        $question = Question::where('slug', $request['slug'])->firstOrFail();

        return response()->json(['question' => $question]);
    }

    public function categories()
    {
        $categories = QuestionCategory::get();

        return response()->json(['categories' => $categories]);
    }

    public function popular()
    {
        $questions = Question::orderByDesc('read_count')->take(6)->get();

        return response()->json(['popular_questions' => $questions]);
    }

    public function increment(Request $request)
    {
        $question = Question::where('slug', $request['slug'])->firstOrFail();
        $question->update(['read_count' => $question->read_count + 1]);

        return response()->json();
    }
}
