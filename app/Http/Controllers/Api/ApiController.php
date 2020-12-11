<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){
        return "Awesome Api";
    }

    public function createToken(Request $request) {
        $token = $request->user()->createToken($request->token_name);
    
        return ['token' => $token->plainTextToken];
    }
}
