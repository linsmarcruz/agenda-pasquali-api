<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Services\AuthService;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {
    }

    public function auth(AuthRequest $request)
    {
        $auth = $this->authService->auth($request);

        return response()->json($auth, Response::HTTP_OK);
    }

    public function logout()
    {
        $logout = $this->authService->logout();

        return response()->json($logout, Response::HTTP_OK);
    }
}
