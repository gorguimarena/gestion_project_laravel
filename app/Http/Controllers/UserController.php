<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Lister les utilisateurs
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Mettre à jour le rôle de l'utilisateur
    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = $request->input('role');
        $user->save();
        return redirect()->back()->with('success', 'Rôle mis à jour avec succès.');
    }

    public function contact()
    {
        return view('users.contact');
    }

    public function contacter(Request $request)
    {
        message::create($request->all());
        return redirect()->route('projects.index');
    }

    public function contacts(Request $request)
    {
        $messages = message::where('isRead', false)->get();
        $isAdmin = Auth::user()->isAdmin();
        return view('message.contact', compact('messages','isAdmin'));
    }

    public function lire($id)
    {
        $message = message::findOrFail($id);
        $message->update(['isRead' => true]);
        return redirect()->route('users.contacts');
    }

}
