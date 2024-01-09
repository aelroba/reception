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

    public function newCards()
    {
        $visitors = Visitor::where('status','!=', 'done')->get();
        return view('auth.new_cards', compact('visitors'));
    }

    public function cards()
    {
        $visitors = Visitor::where('status','!=', 'done')->get();
        return view('auth.new_cards', compact('visitors'));
    }

    public function secretary()
    {
        $visitors = Visitor::where('status','!=', 'done')->get();
        return view('auth.new_secretary', compact('visitors'));
    }

    public function sendVisitor(Request $request)
    {
        Visitor::create([
            'name' => $request->name,
            'status' => 'pending',
            'position' => $request->position,
            'notes' => $request->notes
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

    public function otherStatus(Request $request)
    {
        $id = (string) $request->id;

        $visitor = Visitor::findOrFail($id);
        $visitor->update([
            'other_notes' => $request->other_notes,
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

    public function report()
    {
        $visitors = Visitor::where('status', 'done')->get();
        return view('reports', compact('visitors'));
    }

    public function delete($ignore="", Request $request, $id)
    {
        Visitor::find($id)->delete();
        return redirect()->back();
    }

    public function deleteAll()
    {
        foreach (Visitor::all() as $v) {
            $v->delete();
        }
        return redirect()->back();
    }
}
