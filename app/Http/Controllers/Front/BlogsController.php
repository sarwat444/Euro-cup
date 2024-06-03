<?php

namespace App\Http\Controllers\Front;
use App\Models\{Blog ,Question} ;
use App\Models\Category ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
  public function index(){
    $blogs  =  Blog::with('category')->orderBy('id' , 'desc')->paginate(config('constants.PAGIBNATION_COUNT')) ;
    $allCount  = Blog::count();
    $Categories = Category::withCount('blogs' ,'questions')->get();
    $myQuestions  = Question::with('category' , 'user')->where('category_id' , '!=' , 12 )->whereNotNull('category_id')->where('user_id' , Auth()->id())->orderBy('id' , 'desc')->paginate(config('constants.PAGIBNATION_COUNT')) ;
    $Questions  =  Question::with('category' , 'user')->where('category_id' , '!=' , 12 )->orderBy('id' , 'desc')->paginate(config('constants.PAGIBNATION_COUNT')) ;

    return view('front.blogs.index' , compact('Categories','Questions' ,'myQuestions' , 'blogs' ,'allCount')) ;
  }
  public function show(string $id)
  {
      $blog =  Blog::find($id) ;
      return  view('front.blogs.blog-details' , compact('blog') ) ;
  }
    /*All Blogs*/
    public function blogs(){
        $blogs  =  Blog::orderBy('id' , 'desc')->paginate(config('constants.PAGIBNATION_COUNT')) ;
        $allCount  = Blog::count();
        $Categories = Category::withCount('blogs')->get();
        return view('front.blogs.all_blogs' , compact('Categories', 'blogs' ,'allCount')) ;
    }

}
