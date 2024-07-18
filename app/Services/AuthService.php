<?php

namespace App\Services;

use App\Http\Requests\AuthRequest;
use App\Repositories\UserRepositoryEloquentORM;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct(
        protected UserRepositoryEloquentORM $userRepository
    ) {
    }

    public function auth(AuthRequest $request): array
    {
        $user = $this->userRepository->findByEmail($request->email);

        $validCredentials = $user !== null && Hash::check($request->password, $user->password ?? 0);
        if ($validCredentials === false) {
            throw ValidationException::withMessages(['message' => 'The provide credentials are not correct.']);
        }

        $user->tokens()->delete();
        $token = $user->createToken($request->email)->plainTextToken;

        // TO DO - User Abilities
        $userAbilities = [['action' => 'manage', 'subject' => 'all']];

        return [
            'accessToken' => $token,
            'userData' => $user,
            'userAbilities' => $userAbilities
        ];
    }

    public function logout(): array
    {
        $user = auth()->user();
        $user->tokens()->delete();

        return ['message' => 'Logged out successfully'];
    }
}
