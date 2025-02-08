<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:254'],
            'email' => ['required', 'email', 'max:254', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'max:254'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $payload = $request->all();
        $payload['password'] = Hash::make($payload['password']);
        $user = User::query()->create($payload);
        $success['token'] = $user->createToken('register')->plainTextToken;
        $success['name']  = $user->name;
        $success['email'] = $user->email;

        return $this->sendResponse($success, 'User register successfully.');
    }

    public function login(Request $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            $user = $request->user(); // Auth::user()
            $success['token'] = $user->createToken('login')->plainTextToken;
            $success['name']  = $user->name;
            $success['email'] = $user->email;

            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
}
