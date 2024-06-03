<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Question ;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function questionCategory($category_id = null )
    {
        $Categories = Category::withCount('questions')->get();
        $Questions  = Question::with('category' , 'user')->where('category_id' , '!=' , 12 )->where('category_id' ,$category_id)->orderBy('id' , 'desc')->paginate(config('constants.PAGIBNATION_COUNT')) ;
        $myQuestions = Question::with('category' , 'user')->where('category_id' , '!=' , 12 )->where(['category_id' => $category_id ,  'user_id' =>Auth::id()])->orderBy('id' , 'desc')->paginate(config('constants.PAGIBNATION_COUNT')) ;
        $selected_category  = Category::where('id' , $category_id)->withCount('questions')->first();

        $allCount = Question::count() ;

        return view('front.questions.categoryQuestions' , compact('Questions' ,'myQuestions' , 'Categories' , 'selected_category' , 'allCount')) ;
    }

    public function blogquestionCategory($category_id = null )
    {
        $Categories = Category::withCount('questions')->get();
        $Questions  = Question::with('category' , 'user')->where('category_id' , '!=' , 12 )->where('category_id' ,$category_id)->orderBy('id' , 'desc')->paginate(config('constants.PAGIBNATION_COUNT')) ;
        $myQuestions = Question::with('category' , 'user')->where('category_id' , '!=' , 12 )->where(['category_id' => $category_id ,  'user_id' =>Auth::id()])->orderBy('id' , 'desc')->paginate(config('constants.PAGIBNATION_COUNT')) ;
        $selected_category  = Category::where('id' , $category_id)->withCount('questions')->first();

        $allCount = Question::count() ;

        return view('front.blogs.questions.categoryQuestions' , compact('Questions' ,'myQuestions' , 'Categories' , 'selected_category' , 'allCount')) ;
    }

}
