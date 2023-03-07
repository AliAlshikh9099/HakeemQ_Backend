<?php

namespace App\Http\Controllers;

use App\Traits\UploadImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    use UploadImage;
    //! *************Register section***********************
    public function register(RegisterRequest $req)
    {


        $profile_path = $this->profileimage($req, 'profile');
        $certif_path = $this->certimage($req, 'certificate');
        $doctor = Doctor::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'phone' => $req->phone,
            'profile_image' => $profile_path,
            'certificate_image' => $certif_path,
        ]);



        $token = $doctor->createToken('my_token')->plainTextToken;
        $response = [
            'doctor ' => $doctor,
            'token ' => $token,

        ];

        return response($response, 201);

    }

    //! *************login section***********************
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',

        ]);
        $check_creds=Auth::attempt($request->only(['email', 'password']));


        if ($check_creds) {

               $doctor = Doctor::where('email', $request->email)->first();
            $token = $doctor->createToken('login token')->plainTextToken;
            return response()->json([
                'message' => 'doctor logged in successfully',
                'doctor' => $doctor->name,
                'token' => $token,
            ]);
        } else {
            return response()->json([
                'message' => 'Email or Password not correct',
                'status' => false,

            ]);
            
        }



    }
    //! *************logout section***********************

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();


        return response()->json([
            'message'=>'doctor logged out successfully '
        ]);
    }



}
