<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\AutenticarResource;
use Illuminate\Validation\ValidationException;

class AutenticarController extends Controller
{
    public function register(RegisterRequest $request)
    {
       $user = new User;

       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);

        $user->save();

        return response()->json([
            'res' => true,
            'msg' => 'Registrado correctamente'
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'msg' => ['Las datos no son correctos.'],
            ]);
        }

        $token = $user->createToken($request->email)->plainTextToken;

        return response()->json([
            'res' => true,
            'msg' => 'Logueado correctamente',
            'token' => $token,
            'user' => $user
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'res' => true,
            "msg" => "Sesión cerrada correctamente"
        ]);
        
    }
}