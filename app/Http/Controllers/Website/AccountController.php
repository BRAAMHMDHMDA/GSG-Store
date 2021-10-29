<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function show()
    {

        if (!Auth::check()) {return redirect()->route('home');}

        $user = Auth::user()->load('orders')->first();

        return view('website.my-account')->with([
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:30',
            'email' => ['required','email', Rule::unique('users','email')->ignore(Auth::id())],
            'phone' => ['nullable', 'numeric', Rule::unique('users','phone')->ignore(Auth::id())],
        ]);

        Auth::user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect(route('website.account.show'))->with([
           'success' => 'Updated Info Successfuly'
        ]);
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect(route('website.account.show'))->with([
            'success' => 'Updated Info Successfuly'
        ]);
    }
}
