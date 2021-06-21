<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('guest');
     }

    /**
     * Create and login new User 
     */
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);
        
        $token = $user->createToken('token')->plainTextToken;

        $response = [
            'user' => $user->customer_id,
            'token' => $token
        ];

        return response($response, 201);
    }


    /**
     * Login existing User
     */
    public function login(Request $request){

        $token = null;
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad credentials'
            ], 401);
        }
        
        $token = $user->createToken('token')->plainTextToken;

        $response = [
            'user' => $user->customer_id,
            'token' => $token
        ];

        return response($response, 201);
    }


    /**
     * Logout User
     */
    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return json([
            'message' => 'Logged out'
        ]);
    }
}
