<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\questions\StoreRequest;
use App\Repositories\Panel\QuestionEloquent;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $question;
    public function __construct(QuestionEloquent $questionEloquent)
    {
        $this->question = $questionEloquent;
    }


    public function index()
    {
        return view('panel.questions.index');
    }

    public function getDataTable()
    {
        return $this->question->getDataTable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->question->create();
        return view('panel.questions.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $response = $this->question->store($request);
        return $this->response_api($response['status'], $response['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $question = $this->question->show($id);
        return view('panel.questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->question->edit($id);
        return view('panel.questions.create', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);
        $response = $this->question->update($id, $request);
        return $this->response_api($response['status'], $response['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = $this->question->delete($id);
        return $this->response_api($response['status'], $response['message']);
    }
}
