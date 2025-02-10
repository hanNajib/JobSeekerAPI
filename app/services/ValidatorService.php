<?php 

namespace App\Services;

use Illuminate\Support\Facades\Validator;

class ValidatorService {


    public static function validate($req, $rules, $http = 422, $type = 'message') {
        $validate = Validator::make($req->all(), $rules);

        if($validate->fails() && $type === 'message') {
            ResponseService::json([
                'status' => 'Invalid fields',
                'message' => $validate->errors()->first()
            ], $http);
        }
        if($validate->fails() && $type === 'detail') {
            ResponseService::json([
                'message' => 'Invalid field',
                'errors' => $validate->errors()
            ], $http);
        }
        return null;
        exit;
    }

}