<?php 

namespace App\Services;

class ResponseService {
    public static function json($json = [], $http= 200) {
        response()->json($json, $http)->send();
        exit;
    }

    public static function message($message = 'success', $http = 200) {
        response()->json([
            'message' => $message
        ], $http)->send();
        exit;
    }
}