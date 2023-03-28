<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;


class RegistrationController extends Controller
{

    public function show()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        // dd();
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }

}