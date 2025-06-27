<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

/**
 * Authentication Service implementing Service Pattern
 * Handles business logic for user authentication
 */
class AuthService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Register a new user
     */
    public function register(array $data): array
    {
        // Handle image upload if present
        if (isset($data['image']) && $data['image']) {
            $data['image'] = $data['image']->store('users', 'public');
        }

        $user = $this->userRepository->create($data);
        $token = JWTAuth::fromUser($user);

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    /**
     * Authenticate user and return token
     */
    public function login(array $credentials): ?string
    {
        return JWTAuth::attempt($credentials);
    }

    /**
     * Get authenticated user
     */
    public function getAuthenticatedUser(): ?User
    {
        return auth()->user();
    }

    /**
     * Logout user
     */
    public function logout(): void
    {
        auth()->logout();
    }

    /**
     * Refresh JWT token
     */
    public function refreshToken(): string
    {
        return auth()->refresh();
    }
}