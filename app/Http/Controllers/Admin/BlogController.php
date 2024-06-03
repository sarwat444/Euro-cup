<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\blogs\StoreRequest;
use App\Repositories\Panel\BlogEloquent;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $blog;
    public function __construct(BlogEloquent $blogEloquent)
    {
        $this->blog = $blogEloquent;
    }


    public function index()
    {
        return view('panel.blogs.index');
    }

    public function getDataTable()
    {
        return $this->blog->getDataTable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $response = $this->blog->store($request);
        return $this->response_api($response['status'], $response['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->blog->edit($id);
        return view('panel.blogs.create', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = $this->blog->update($id, $request);
        return $this->response_api($response['status'], $response['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = $this->blog->delete($id);
        return $this->response_api($response['status'], $response['message']);
    }
}
