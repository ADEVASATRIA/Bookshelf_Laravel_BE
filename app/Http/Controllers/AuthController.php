<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->save();

        return response()->json([
            'message' => 'User successfully registered',
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->plainTextToken;

            return response()->json([
                'User' => $user,
                'Noted' => "Successfully logged in",
                'Berikut Token yang bisa dipakai' => $token,
            ], 200);
        }

        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }

    public function getAllUsers()
    {
        $users = User::all();

        return response()->json([
            'users' => $users
        ], 200);
    }

    public function getUsersByEmail($email){
        // Validasi alamat email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'error' => 'Invalid email format',
            ], 400);
        }

        // Cari pengguna berdasarkan alamat email
        $user = User::where('email', $email)->first();

        // Periksa apakah pengguna ditemukan
        if (!$user) {
            return response()->json([
                'error' => 'User not found',
            ], 404);
        }

        // Kembalikan pengguna yang ditemukan dalam respons JSON
        return response()->json([
            'user' => $user,
            'Noted' => "Successfully show user specified by email",
        ], 200);
    }
}
