<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                tap(
                    User::create([
                        'name' => $request['name'],
                        'email' => $request['email'],
                        'password' => Hash::make($request['password']),
                    ])
                );

                return $this->return_api(true, Response::HTTP_CREATED, trans("auth.success"), null, null);
            });
        } catch (Exception $e) {
            return $this->return_api(false, Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage(), null, null);
        }
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt($validated, true)) {
            $user = Auth::user();
            $user->access_token =  $user->createToken('authToken')->plainTextToken;
            return $this->return_api(true, Response::HTTP_OK, null, new UserResource($user), null);
        } else {
            return $this->return_api(false, Response::HTTP_UNAUTHORIZED, trans("auth.failed"), null, null);
        }
    }

    public function logout()
    {
        // Revoke all tokens
        $user = Auth::user()->tokens()->delete();

        return $this->return_api(true, Response::HTTP_OK, null, null, null);
    }
}
