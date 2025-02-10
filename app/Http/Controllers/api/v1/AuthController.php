<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SocietyResource;
use App\Models\Societies;
use App\Services\ResponseService;
use App\Services\ValidatorService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $req) {
        ValidatorService::validate($req, [
            'id_card_number' => 'required',
            'password' => 'required'
        ]);

        $societies = Societies::where('id_card_number', $req->id_card_number)->first();
        if(!$societies || $societies->password !== $req->password) {
            ResponseService::json([
            'message' => 'ID Card Number or Password incorrect'
            ], 401);
        }

        $societies->login_tokens = $societies->token;
        $societies->save();

        ResponseService::json(new SocietyResource($societies));
    }

    public function logout(Request $req) {
        $societies = $req->get('societies');
        if($societies) {
            $societies->login_tokens = null;
            $societies->save();
            ResponseService::message('Logout success');
        }
    }
    
    
}
