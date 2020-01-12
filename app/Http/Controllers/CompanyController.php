<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return response()->json(
            [
                'status' => 'success',
                'companies' => $companies->toArray()
            ], 200);
    }

    public function show(Request $request, $id)
    {
        $company = Company::find($id);
        return response()->json(
            [
                'status' => 'success',
                'company' => $company->toArray()
            ], 200);
    }

    public function delete(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        if($company)
            $company->delete();
        else
            return response()->json(error);
        return response()->json(null); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Company::create([
            'empresa' => $data['empresa'],
            'email' => $data['email'],
            'setor' => $data['setor'],
            'responsavel' => $data['responsavel'],
            'whats' => $data['whats']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
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
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
