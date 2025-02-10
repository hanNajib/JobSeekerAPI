<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Validation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ApplicationResource;
use App\Models\AvailablePosition;
use App\Models\JobApplyPosition;
use App\Models\JobApplySocieties;
use App\Services\ResponseService;
use App\Services\ValidatorService;
use Illuminate\Support\Facades\DB;
use Throwable;

class ApplicationController extends Controller
{
    public function apply(Request $req) {
        $societies = $req->get('societies');
        $validation = Validation::where([
            'society_id' => $societies->id,
        ])->orderBy('id', 'desc')->first();

        ValidatorService::validate($req, [
            'vacancy_id' => 'required|exists:job_vacancies,id',
            'positions' => 'required|array|min:1',
            'positions.*' => 'exists:available_positions,id',
            'notes' => 'required'
        ], 422, 'detail');

        $isFirst = JobApplySocieties::where('society_id', $societies->id)->first();
        if($isFirst) {
            ResponseService::message(' Application for a job can only be once', '401');
        }

        if($validation->status !== 'accepted') {
            ResponseService::json([
                'message' => 'Your data validator must be accepted by validator before'
            ], 401);
        }

        try {
            DB::beginTransaction();
            $JobApplySocieties = JobApplySocieties::create([
                'notes' => $req->notes,
                'society_id' => $societies->id,
                'date' => date_format(now(), 'Y-m-d'),
                'job_vacancy_id' => $req->vacancy_id
            ]);

            foreach($req->positions as $position) {
                $availablePos = AvailablePosition::where('id', $position)->first();
                if($availablePos->apply_capacity >= $availablePos->capacity) {
                    ResponseService::message("Apply Capacity full for position with id $position", 400);
                }
                JobApplyPosition::create([
                    'job_apply_societies_id' => $JobApplySocieties->id,
                    'position_id' => $position,
                    'society_id' => $societies->id,
                    'date' => date_format(now(), 'Y-m-d'),
                    'job_vacancy_id' => $req->vacancy_id
                ]);

                $availablePos->apply_capacity += 1;
                $availablePos->save();

            }

            DB::commit();
            ResponseService::message('Applying for job successful');
        } catch (Throwable $e) {
            DB::rollBack();
            ResponseService::message('Applying for job failed', 400);
        }
    }

    public function getAll(Request $req) {
        $societies = $req->get("societies");
        $JobApplySocieties = JobApplySocieties::where('society_id', $societies->id)->with(['JobVacancies.category', 'positions'])->get();
        // return $JobApplySocieties;   
        ResponseService::json([
            'vacancies' => ApplicationResource::collection($JobApplySocieties)
        ]);     
    }
}
