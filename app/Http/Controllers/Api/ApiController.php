<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function index(){
        return "Awesome Api";
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            // 'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.',
            ],404);
        }
        return $user->createToken('gofoofa_user')->plainTextToken;
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logged Out Successfully',
        ],200);
    }

    public function getUser(){
        return Auth::user();
    }

    public function store(Request $request){
        $request->validate([
            'name'=> 'string|required|max:50',
            'email'=> 'email|required|unique:users',
            'password'=> 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' =>$request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
            // Only Message if registration is successfull
        return response()->json([
            'message' => 'User Created Successfully',
        ],200);

        // Login with registration
        // return $user->createToken('gofoofa_user')->plainTextToken;

    }

    // public function createToken(Request $request) {
    //     $token = $request->user()->createToken($request->token_name);
    
    //     return ['token' => $token->plainTextToken];
    // }
}
