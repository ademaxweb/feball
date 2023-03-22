<?php

namespace App\Services;


use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    /**
     * Create a new User
     * @param array $data
     * @return mixed
     */
    public function register(array $data): mixed
    {
        $credentials = [
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => Hash::make($data["password"])
        ];

        $user = User::query()->create($credentials);
        $user->roles()->attach(Role::query()->find(1));
        return auth()->login($user);
    }

    /**
     * Get a JWT via credentials
     * @param array $credentials
     * @return bool|string
     */
    public function login(array $credentials): bool|string {
        return auth()->attempt($credentials);

    }

    /**
     * Invalidate the token
     * @return bool
     */
    public function logout(): bool
    {
        auth()->logout();
        return true;
    }

    /**
     * Get the authenticated User
     * @return Authenticatable|null
     */
    public function getUser(): ?Authenticatable
    {
        return auth()->user();
    }

    /**
     * Refresh a token
     * @return mixed|object
     */
    public function refresh()
    {
        return auth()->refresh();
    }

    /**
     * Get the token array structure
     * @param $token
     * @return JsonResponse
     */
    public function respondWithToken($token): JsonResponse
    {
        if (!$token) return response()->json([
            "error" => "Unauthorized"
        ], 401);

        return response()->json([
            "access_token" => $token,
            "token_type" => "bearer",
            "expires_in" => auth()->factory()->getTTL() * 60
        ]);
    }
}
