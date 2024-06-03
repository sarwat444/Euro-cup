<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Questions\storequestionRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Traits\ResponseJson;

class QuestionsController extends Controller
{
    use ResponseJson;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Questions = Question::with('category', 'user')->where('category_id', '!=', 12)->orderBy('id', 'desc')->paginate(config('constants.PAGIBNATION_COUNT'));
        $myQuestions = Question::with('category', 'user')->where('category_id', '!=', 12)->whereNotNull('category_id')->where('user_id', Auth()->id())->orderBy('id', 'desc')->paginate(config('constants.PAGIBNATION_COUNT'));
        $Categories = Category::withCount('questions')->get();
        return view('front.questions.questions', compact('Questions', 'myQuestions', 'Categories'));
    }

    public function blogQuestions()
    {
        $Questions = Question::with('category', 'user')->where('category_id', '!=', 12)->orderBy('id', 'desc')->paginate(config('constants.PAGIBNATION_COUNT'));
        $myQuestions = Question::with('category', 'user')->where('category_id', '!=', 12)->whereNotNull('category_id')->where('user_id', Auth()->id())->orderBy('id', 'desc')->paginate(config('constants.PAGIBNATION_COUNT'));
        $Categories = Category::withCount('questions')->get();
        return view('front.blogs.questions.questions', compact('Questions', 'myQuestions', 'Categories'));
    }

    public function all_questions()
    {
        $Questions = Question::with('user')->where('category_id', 12)->orderBy('id', 'desc')->paginate(config('constants.PAGIBNATION_COUNT'));
        $myQuestions = Question::with('user')->where('category_id', 12)->where('user_id', Auth()->id())->orderBy('id', 'desc')->paginate(config('constants.PAGIBNATION_COUNT'));
        $Categories = Category::withCount('questions')->get();
        return view('front.questions.all-questions', compact('Questions', 'myQuestions', 'Categories'));
    }

    public function public_blogQuestions()
    {
        $Questions = Question::with('user')->where('category_id', 12)->orderBy('id', 'desc')->paginate(config('constants.PAGIBNATION_COUNT'));
        $myQuestions = Question::with('user')->where('category_id', 12)->where('user_id', Auth()->id())->orderBy('id', 'desc')->paginate(config('constants.PAGIBNATION_COUNT'));
        $Categories = Category::withCount('questions')->get();
        return view('front.blogs.questions.all-questions', compact('Questions', 'myQuestions', 'Categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('front.questions.create_question', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        try {
            // Create a new instance of Question
            $question = new Question();
            $data = $request->all();
            $question->category_id = $request->category_id;
            $question->user_id = Auth::id();
            $detailsArray = [];
            foreach (locales() as $key => $locale) {
                $detailsArray["details_$key"] = $data['details'];
            }
            $request->request->add($detailsArray);

            $question->createTranslation($request);

            // Get the translated success message
            $successMessage = Lang::get('front.Your question will be answered as soon as possible');

            // Flash the translated success message
            Session::flash('success_message', $successMessage);

            return response()->json(['message' => 'Stored Successfully'], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // If there are validation errors, return them as JSON response
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $question = Question::with('answers')->find($id);
        return view('front.questions.view_question', compact('question'));
    }

    public function create_public_function()
    {
        return view('front.questions.create_public_question');
    }

    public function blog_question_create()
    {
        $categories = Category::all();
        return view('front.blogs.questions.create_question', compact('categories'));
    }

    public function create_public_question()
    {
        return view('front.blogs.questions.create_public_question');
    }

    public function create_public_blogquestion()
    {
        return view('front.blogs.questions.create_public_question');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
