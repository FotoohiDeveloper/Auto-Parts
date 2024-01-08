<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($req = $request->all(), [
            'email' => 'email|required',
            'password' => 'required|string'
        ]);

        if ($validate->fails())
        {
            $errors = $validate->getMessageBag();
            return redirect()->back()->with(['errors' => $errors]);
        }

        if (Auth::attempt([$req]))
        {
            $request->session()->regenerate();
            return redirect()->route('panel');
        }

        return redirect()->back()->with([
            'message' => ['ایمیل یا کلمه عبور اشتباه میباشد']
        ]);
    }
}
