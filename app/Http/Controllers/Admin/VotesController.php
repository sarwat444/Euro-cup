<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\votes\StoreRequest;
use App\Repositories\Panel\VoteEloquent;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $vote;
    public function __construct(VoteEloquent $voteEloquent)
    {
        $this->vote = $voteEloquent;
    }


    public function index()
    {
        return view('panel.votes.index');
    }

    public function getDataTable()
    {
        return $this->vote->getDataTable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->vote->create();
        return view('panel.votes.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $response = $this->vote->store($request);
        return $this->response_api($response['status'], $response['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vote = $this->vote->show($id);
        return view('panel.votes.show', compact('vote'));
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
        $response = $this->vote->delete($id);
        return $this->response_api($response['status'], $response['message']);
    }

    public function changeStatus($id)
    {
        $response = $this->vote->changeStatus($id);
        return $this->response_api($response['status'], $response['message']);
    }
}
