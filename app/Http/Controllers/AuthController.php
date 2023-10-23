<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function cards()
    {
        $visitors = Visitor::where('status','!=', 'done')->get();
        return view('auth.cards', compact('visitors'));
    }

    public function secretary()
    {
        $visitors = Visitor::where('status','!=', 'done')->get();
        return view('auth.secretary', compact('visitors'));
    }

    public function sendVisitor(Request $request)
    {
        Visitor::create([
            'name' => $request->name,
            'status' => 'pending',
            'position' => $request->position
        ]);

        return response()->json(['status' => 'success', 'message' => null])->setStatusCode(200);
    }

    public function updateStatus(Request $request)
    {
        $id = (string) $request->id;

        $visitor = Visitor::findOrFail($id);
        $visitor->update([
            'status' => $request->status,
        ]);
        return response()->json(['status' => 'success', 'message' => null])->setStatusCode(200);
    }

    public function logout()
    {
        if(auth()->check()) {
            auth()->logout();
        }
        return redirect()->route('login');
    }
}
