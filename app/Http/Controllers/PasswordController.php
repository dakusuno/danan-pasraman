<?php

namespace App\Http\Controllers;

use App\Sisya;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit(Sisya $sisya)
    {
        return view('/sisya.password', compact('sisya', $sisya));
    }

    public function update(Request $request, Sisya $sisya)
    {
        $user = User::find($sisya->user_id);

        // if (!Hash::check($user->password, $request['old_password'])) {
            // return fail(__('The current password is incorrect.'));
        // }

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('sisya.edit', ['sisya' => $sisya]);
    }
}
