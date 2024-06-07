<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit($id)
    {
        return view('admin.userprofile_edit', [
            'title' => 'Edit Profile',
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|lowercase|max:50',
            'password' => 'nullable|min:8',
        ]);

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']); // ini kenapa di unset ? karena password tdk di munculkan
        }

        $user = auth()->user();
        $user->fill($data);
        $user->save();
        flash('Data Anda Berhasil di Ubah');
        return back();

    }
}
