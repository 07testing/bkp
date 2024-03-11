<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Validator;

class UserController extends Controller
{
    public function registration(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'name'      => 'required|string',
                'email'     => 'required|string|email',
                'password'  => 'required',
            ]);
            if($validator->fails()){
                return response()->json([
                    'status'  => false,
                    'message' => 'validation error',
                    'errors'  => $validator->errors()
                ], 401);
            }
            $data = [
                            'name'     => $request->name,    
                            'email'    => $request->email,    
                            'password' => Hash::make($request->input('password'))
                    ];
            $checkEmailUnique = User::where('email', $request->email)->first();
            if(empty($checkEmailUnique)){
                $user = User::create($data);
                return response()->json([
                    'status' => true,
                    'message' => 'User Created Successfully',
                ], 200);
            }else{
                return response()->json([
                    'status' => true,
                    'message' => 'Email already taken',
                ], 201);
            }

        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function login(Request $request){
        try{
            $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user(); // Retrieve the authenticated user
                $token = $user->createToken('sanctum')->plainTextToken;
                 $loggedUser = array(
                            'name' => $user['name'],               
                            'email' => $user['email'],               
                            'token' => $token          
                            );
                return response()->json([
                    'status' => true,
                    'message' => 'Login successful',
                    'data' => $loggedUser
                ], 201);
            }else{
                // If authentication fails
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid credentials'
                ], 401);

            }
            
        }catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getUser(Request $request){
        $getAll = User::all();
        if($getAll){
            return response()->json([
                'status'  => true,
                'message' => 'Login Successfully',
                'data'    => $getAll
            ], 200); 
        }else{
            return response()->json([
                'status'  => true,
                'message' => 'Data Not Available',
                'data'    => ''
            ], 201); 
        }
    }
    
}
