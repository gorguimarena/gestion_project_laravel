<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetController extends Controller
{
    // Afficher tous les projets
    public function index()
    {
        $projets = Projet::all();
        $isAdmin = Auth::user()->isAdmin(); // Vérifie si l'utilisateur est admin
        return view('projets.index', compact('projets', 'isAdmin'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('projets.create');
    }

    // Créer un nouveau projet
    public function store(Request $request)
    {
        Projet::create($request->all());
        return redirect()->route('projects.index');
    }

    // Afficher le formulaire de modification
    public function edit($id)
    {
        $projet = Projet::findOrFail($id);
        return view('projets.edit', compact('projet'));
    }

    // Mettre à jour un projet
    public function update(Request $request, $id)
    {
        $projet = Projet::findOrFail($id);
        $projet->update($request->all());
        return redirect()->route('projects.index');
    }

    // Supprimer un projet
    public function destroy($id)
    {
        $projet = Projet::findOrFail($id);
        $projet->delete();
        return redirect()->route('projects.index');
    }
    //details du projet
    public function show($id)
    {
        $projet = Projet::findOrFail($id);
        return view('projets.show', compact('projet'));
    }

}
