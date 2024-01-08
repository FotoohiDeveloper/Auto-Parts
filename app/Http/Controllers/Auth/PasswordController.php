<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    public function show()
    {
        return view('panel.User.changeMyPassword');
    }

    public function store(Request $requestq)
    {
        $validate = Validator::make($req = $requestq->all(), [
            'old_password' => 'required|string',
            'new_password' => 'required|string',
            'verify_password' => 'required|string'
        ]);

        if ($validate->fails())
        {
            $errors = $validate->getMessageBag();
            return redirect()->back()->with('errors', $errors);
        }

        if ($req['new_password'] != $req['verify_password'])
        {
            return redirect()->back()->with('errors', ['کلمه عبور جدید با تکرار آن متفاوت است']);
        }

        if (password_verify($req['old_password'], auth()->user()->password))
        {
            auth()->user()->password = bcrypt($req['new_password']);
            auth()->user()->save();
            return redirect()->back()->with('success', 'کلمه عبور شما با موفقیت بروزرسانی شد');
        }

        return redirect()->back()->with('errors', ['کلمه عبور شما نادرست است']);
    }
}
