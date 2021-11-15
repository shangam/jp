<?php

namespace App\Http\Controllers\CompanyManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyManagement\Company;
use App\Http\Resources\CompanyManagement\CompanyResource;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $this->sendCollection(Company::class, CompanyResource::class);
        return CompanyResource::collection(Company::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->contact = $request->contact;
        $company->address = $request->address;
        $company->location = $request->location;
        $company->save();
        return $this->response(true, 'Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new CompanyResource(Company::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->name = $request->name;
        $company->contact = $request->contact;
        $company->address = $request->address;
        $company->location = $request->location;
        $company->save();
        return $this->response(true, 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->Delete();
        return $this->response(true, 'Deleted Successfully.');
    }

    public function search($name)
    {
        return Company::where('name', 'like', '%'.$name.'%')->get();
    }
}
