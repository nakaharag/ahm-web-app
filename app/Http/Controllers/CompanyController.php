<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    public function create(Request $request)
    {   
        $v = Validator::make($request->all(), [
            'email' => 'required|email|unique:companies',
            'responsavel' => 'required',
            'empresa' => 'required',
        ]);
        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $company =  Company::create([
            'empresa' => $request['empresa'],
            'email' => $request['email'],
            'setor' => $request['setor'],
            'responsavel' => $request['responsavel'],
            'whats' => $request['whats'],
            'horas' => $request['horas'],
            'url_hospedagem' => $request['url_hospedagem'],
            'user_hospedagem' => $request['user_hospedagem'],
            'pw_hospedagem' => $request['pw_hospedagem'],
            'url_googleads' => $request['url_googleads'],
            'user_googleads' => $request['user_googleads'],
            'pw_googleads' => $request['pw_googleads'],
            'url_linkedin' => $request['url_linkedin'],
            'user_linkedin' => $request['user_linkedin'],
            'pw_linkedin' => $request['pw_linkedin'],
            'url_twitter' => $request['url_twitter'],
            'user_twitter' => $request['user_twitter'],
            'pw_twitter' => $request['pw_twitter'],
            'url_youtube' => $request['url_youtube'],
            'user_youtube' => $request['user_youtube'],
            'pw_youtube' => $request['pw_youtube'],
            'url_facebook' => $request['url_facebook'],
            'user_facebook' => $request['user_facebook'],
            'pw_facebook' => $request['pw_facebook'],
            'url_instagram' => $request['url_instagram'],
            'user_instagram' => $request['user_instagram'],
            'pw_instagram' => $request['pw_instagram'],
            'margem' => $request['margem'],
            'faturamento' => $request['faturamento'],
            'clientes' => $request['clientes'],
            'fans_face' => $request['fans_face'],
            'seguidores_insta' => $request['seguidores_insta'],
            'inscritos' => $request['inscritos'],
            'contatos' => $request['contatos'], 
            'seguidores_twitter' => $request['seguidores_twitter'],
            'obs' => $request['obs']
        ]);

        $company->save();

        return response()->json($company, 201);
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
