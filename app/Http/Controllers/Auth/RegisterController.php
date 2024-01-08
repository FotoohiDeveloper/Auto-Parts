<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($req = $request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'national_code' => 'required|string|unique:users,national_code',
            'address' => 'required|string',
            'phone_number' => 'required|string|unique:users,phone_number',
            'password' => 'required|string',
        ]);

        if ($validate->fails())
        {
            $errors = $validate->getMessageBag();
            return redirect()->back()->with('errors', $errors);
        }

        if ($user = User::create($req))
        {
            Auth::login($user);
            return redirect()->route('panel');
        }

        return redirect()->back()->with('errors', ['خطایی رخ داد']);
    }
}
