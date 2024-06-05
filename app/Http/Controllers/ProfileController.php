<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('user.profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }
}
