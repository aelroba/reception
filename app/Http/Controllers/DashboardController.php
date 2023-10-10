<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeRating;
use App\Models\Template;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        if (auth()->user()->hasRole('employee')) {
            $employee = Employee::where('user_id', auth()->user()->id)->first();
            $templates = Template::all()->pluck('title', 'id');
            $ratings = EmployeeRating::where([
                'user_id' => $employee->user_id,
            ])->get();
            return view('employees.show', compact('employee', 'templates', 'ratings'));

        }
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
