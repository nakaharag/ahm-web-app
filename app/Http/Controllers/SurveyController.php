<?php

namespace App\Http\Controllers;
use App\Surveys;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index(Request $request, $id)
   {
        return Surveys::where('company_id', $request['id'])->get();
        //return response()->json(Surveys::where('company_id', $request['id'])->find(), 200);
   }

   public function store(Request $request)
    {
        $data = $request->validate([
            'company_id' => 'required',
            'survey_id' => 'required|string',
            'result_id' => 'required',
            'survey_name' => 'required'
        ]);

        //$survey = Surveys::create($data);

        $survey =  Surveys::create([
            'company_id' => $data['company_id'],
            'survey_id' => $data['survey_id'],
            'result_id' => $data['result_id'],
            'survey_name' => $data['survey_name']
        ]);

        $survey->save();

        //return new ReviewResource($review);
        return response()->json($survey, 201);
    }
    public function delete(){
        return;
    }
}
