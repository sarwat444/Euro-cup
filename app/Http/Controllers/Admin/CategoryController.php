<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\CategoryRequest;
use App\Models\Category;
use App\Repositories\Panel\CategoryEloquent;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $category;
    public function __construct(CategoryEloquent $category_eloquent)
    {
        $this->category = $category_eloquent;
    }


    public function index()
    {
        return view('panel.categories.index');
    }

    public function getDataTable()
    {
        return $this->category->getDataTable();
    }

    public function create()
    {
        return view('panel.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $response = $this->category->store($request);
        return $this->response_api($response['status'], $response['message']);
    }

    public function edit($id)
    {
        $data = $this->category->edit($id);
        return view('panel.categories.create', $data);
    }

    public function update($id, CategoryRequest $request)
    {
        $response = $this->category->update($id, $request);
        return $this->response_api($response['status'], $response['message']);
    }


    public function delete($id)
    {
        $response = $this->category->delete($id);
        return $this->response_api($response['status'], $response['message']);
    }

    public function operation(Request $request)
    {
        $response = $this->category->operation($request);
        return $this->response_api($response['status'], $response['message']);
    }

}
