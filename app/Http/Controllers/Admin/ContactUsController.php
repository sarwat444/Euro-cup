<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Panel\ContactUsEloquent;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $contactUs;
    public function __construct(ContactUsEloquent $contactUsEloquent)
    {
        $this->contactUs = $contactUsEloquent;
    }


    public function index()
    {
        return view('panel.contact_us.index');
    }

    public function getDataTable()
    {
        return $this->contactUs->getDataTable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.contact_us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
