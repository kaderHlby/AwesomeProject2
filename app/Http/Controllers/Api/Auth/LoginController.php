<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\Auth\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $creds = $request->only(['email', 'password']);
        $token = auth()->attempt($creds);
        $role = auth()->user()->role;
        return response()->json(['token' => $token, 'role' => $role]);
    }
}
