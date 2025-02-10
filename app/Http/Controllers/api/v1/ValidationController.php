<?php

namespace App\Http\Controllers\api\v1;

use Throwable;
use App\Models\Validation;
use Illuminate\Http\Request;
use App\Services\ResponseService;
use App\Services\ValidatorService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ValidationController extends Controller
{

    public function create(Request $req) {
        $society = $req->get('societies');
        
        ValidatorService::validate($req, [
            'work_experience' => 'required',
            'job_category_id' => 'required|exists:job_categories,id',
            'job_position' => 'required',
            'reason_accepted' => 'required'
        ]);


        try {
            DB::beginTransaction();
            Validation::create([
                'work_experience' => $req->work_experience,
                'job_category_id' => $req->job_category_id,
                'job_position' => $req->job_position,
                'reason_accepted' => $req->reason_accepted,
                'society_id' => $society->id
            ]);

            DB::commit();
            ResponseService::message('Request data validation sent successful');
        } catch(Throwable $e) {
            DB::rollBack();
            ResponseService::message('Request data validation failed', 400);
        }
    }

    public function get(Request $req) {
        $society = $req->get('societies');

        $validation = Validation::where('society_id', $society->id)->latest('id')->first();
        ResponseService::json([
            'validation' => $validation
        ]);
    }
    
    
}
