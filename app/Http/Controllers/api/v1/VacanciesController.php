<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\VacanciesDetailResource;
use App\Models\JobVacancies;
use App\Models\Validation;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    public function get(Request $req) {
        $societies = $req->get('societies');
        $validation = Validation::where([
            'society_id' => $societies->id,     
            'status' => 'pending',
        ])->orderBy('id', 'desc')->first();


        $vacancies = JobVacancies::where('job_category_id', $validation->job_category_id ?? null)->with(['category', 'availablePosition'])->get();
        ResponseService::json([
            'vacancies' => $vacancies
        ]);
    }

    public function getDetail(Request $req, $id) {
        $societies = $req->get('societies');
        $vacancies = JobVacancies::find($id);
        ResponseService::json([
            'vacancy' => new VacanciesDetailResource($vacancies)
        ]);
    }
}
