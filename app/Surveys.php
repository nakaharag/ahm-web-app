<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surveys extends Model
{
    protected $fillable = ['survey_id', 'result_id', 'company_id', 'survey_name'];

    // public function survey(){
    //     return $this->belongsTo(Company::class);
    // }
}
