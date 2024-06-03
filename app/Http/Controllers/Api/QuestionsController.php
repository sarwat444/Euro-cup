<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Api\QuestionEloquent;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Question\StoreQuestionRequest;

class QuestionsController extends Controller
{
    protected $question_eloquent;

    public function __construct(QuestionEloquent $question_eloquent)
    {
        $this->question_eloquent = $question_eloquent;
    }
    public function index(Request $request) {

        if (!empty($request->category_id))  {
            if (request()->header('type') == 'all')  {
                $response = $this->question_eloquent->categoryQuestions($request->category_id);
            }else {
                $response = $this->question_eloquent->categoryUserQuestions($request->category_id);
            }
        }
        else if (request()->header('type') == 'public')  {
            $response = $this->question_eloquent->allpublicQuestions();
        }else if (request()->header('type') == 'all')  {
            $response = $this->question_eloquent->allQuestions();
        }
        return $response;
    }

    public function myQuestions() {
        $type     = request()->header('type')??'all';
        $response = $this->question_eloquent->myQuestions($type);
        return $response;
    }

    public function show($id) {
        $response = $this->question_eloquent->show($id);
        return $response;
    }

    public function store(StoreQuestionRequest $request) {
        $response = $this->question_eloquent->store($request);
        return $response;
    }

    public function update($id , StoreQuestionRequest $request) {
        $response = $this->question_eloquent->update($id , $request);
        return $response;
    }

    public function destroy($id) {
        $response = $this->question_eloquent->delete($id);
        return $response;
    }
}
