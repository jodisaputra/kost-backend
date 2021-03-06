<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|max:255|min:6|confirmed',
            'phoneNumber' => 'required|string|max:255|min:11',
            'gender' => 'required|string'
        ]);

        if($validator->fails())
        {
            return response(['errors' => $validator->errors()], 422);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone_number = $request->phoneNumber;
        $user->gender = $request->gender;
        $user->roles = 'USER';
        $user->save();

        return $this->getResponse($user);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255|min:6',
        ]);

        if($validator->fails())
        {
            return response(['errors' => $validator->errors()], 422);
        }

        $credentials = \request(['email', 'password']);

        if(Auth::attempt($credentials))
        {
            $user = $request->user();
            return $this->getResponse($user);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response('successfully logout', 200);
    }

    public function user(Request $request)
    {
        return $request->user();
    }

    private function getResponse(User $user)
    {
        //create Token
        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeek(1);
        $token->save();

        return response([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ], 200);
    }
}
