<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('dashboard');
    }

    public function profile()
    {
        $users = User::all(['name', 'id'])->pluck('name', 'id');
        return view('user.profile', compact('users'));

    }
    public function postProfile(Request $request)
    {
        if($request->pass != "") {
            $request->merge(['password' => Hash::make($request->pass)]);
        }
        $data = $request->except(['email', 'employee_id', '_token', 'pass']);

        $user = auth()->user();
        $user->update($data);
        $user->save();

        return redirect()->route('dashboard');
    }
}
