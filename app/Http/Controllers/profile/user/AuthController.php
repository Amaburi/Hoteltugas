<?php

namespace App\Http\Controllers\profile\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed|min:6'
        ]);

        $fields['password'] = bcrypt($fields['password']);

        $user = User::create($fields);
        $user->assignRole('user');

        return response()->json([
            'code' => 201,
            'status' => 'success',
            'message' => $user->name . ' berhasil di buat',
            'data' => $user
        ], 201);
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response()->json([
                'code' => 401,
                'status' => 'error',
                'message' => 'Email atau password salah'
            ], 401);
        }

        $token = $user->createToken('sanctum_token')->plainTextToken;

        return response()->json([
            'code' => 201,
            'status' => 'success',
            'message' => $user->name . ' berhasil login',
            'data' => [
                'user' => $user,
                'token' => $token,
                'type' => 'Bearer'
            ]
        ], 201);
    }
    
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return[
            'message' => 'Logged out'
        ];
    }
    public function index()
    {
        $data = User::all();
        return $data;
    }
}
