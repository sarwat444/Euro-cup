<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\BlogEloquent;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    protected $blog_eloquent;

    public function __construct(BlogEloquent $blog_eloquent)
    {
        $this->blog_eloquent = $blog_eloquent;
    }
    public function index(Request $request) {

        if (request()->hasHeader('category_id'))  {
            $response = $this->blog_eloquent->categoryblogs(request()->header('category_id'));
        }else {
            $response = $this->blog_eloquent->allblogs();
        }
        return $response;
    }

    public function show($id) {
        $response = $this->blog_eloquent->show($id);
        return $response;
    }

}
