<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminModel;
use ErrorException;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function api_create_admin(Request $request){
        try{
            $validator = Validator::make($request->all(),[
                'name' => ['required', 'min:1'],
                'username' => ['required', 'min:8'],
                "email" => ['required', 'email'],
                'password' => ['required', 'min:8']
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }

            $data = [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                "password" => Hash::make($request->password)
            ];


            AdminModel::create($data);
            $response = [
                'Success' => 'Success Make Admin Account'
            ];

            return response()->json($response, 201);
        }
        catch (ErrorException $e){
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, 501);
        }
    }

    public function index(){
        return view('login');
    }

    public function submit_login(Request $request){

        $validated = $request->validate([
            'username' => ['required', 'min:8'],
            'password' => ['min:8', 'required']
        ]);

        $admin = AdminModel::where('username', $validated['username'])->first();
        if(!$admin) return redirect()->route('dashboard_login')->with('error', 'Account not found! Please check your username.');
        $checkPassword = Hash::check($validated['password'], $admin->password);
        if(!$checkPassword) return redirect()->route('dashboard_login')->with('error', 'Account not found! Please check your password.');

        session()->put('id', $admin->id);
        session()->put('name', $admin->name);
        session()->put('email', $admin->email);

        return redirect()->route('dashboard_mahasiswa');
    }

    public function submit_logout(){
        session()->flush();

        return redirect()->route('dashboard_login')->with('success', 'You have successfully logged out.');
    }
}
