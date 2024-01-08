<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $detail = auth()->user();
        return view('panel.showUser', compact('detail'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user) {
            $validate = Validator::make($req = $request->only('first_name', 'last_name', 'email', 'national_code', 'address', 'phone_number'), [
                'first_name' => ['string', 'required'],
                'last_name' => ['string', 'required'],
                'email' => ['email', 'required', 'unique:users,email,' . $user->id],
                'national_code' => ['string', 'regex:/^\d{10}$/', 'required', 'unique:users,national_code,' . $user->id],
                'address' => 'string|required',
                'phone_number' => ['string', 'regex:/^09\d{9}$/', 'required', 'unique:users,phone_number,' . $user->id],
            ]);

            if ($validate->fails()) {
                $errorMessages = $validate->getMessageBag()->all();
                return redirect()->back()->with('errors', $errorMessages);
            }

            $user->fill($req);
            $user->save();

            return redirect()->back()->with('success', 'تغییرات شما با موفقیت انجام شد');
        }
    }


}
