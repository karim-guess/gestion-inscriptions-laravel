<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    // Formulaire
    public function create()
    {
        return view('formulaire');
    }

    // Enregistrement
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'   => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'statut'=> 'required|string|in:validee,en_attente,dossier_incomplet',
        ]);

        Inscription::create($validated);

        return redirect()->route('inscriptions.index');
    }

    // Listing + recherche + filtre + tri priorité + pagination
    public function index(Request $request)
    {
        $query = Inscription::query();

        if ($search = $request->query('search')) {
            $query->where(function($q) use ($search) {
                $q->where('nom', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($statut = $request->query('statut')) {
            $query->where('statut', $statut);
        }

        $inscriptions = $query
            ->orderByDesc('prioritaire')
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('listing', compact('inscriptions'));
    }

    // Toggle étoile
    public function togglePriorite(Inscription $inscription)
    {
        $inscription->update(['prioritaire' => ! $inscription->prioritaire]);
        return back();
    }

    public function edit(Inscription $inscription)
{
    // On affiche le même formulaire que pour create, mais pré-rempli
    return view('formulaire', compact('inscription'));
}

public function update(Request $request, Inscription $inscription)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telephone' => 'nullable|string|max:20',
        'date_inscription' => 'required|date',
        'statut' => 'required|string',
    ]);

    $inscription->update($request->all());

    return redirect()
        ->route('inscriptions.index')
        ->with('success', 'Inscription mise à jour avec succès.');
}

public function destroy(Inscription $inscription)
{
    $inscription->delete();

    return redirect()
        ->route('inscriptions.index')
        ->with('success', 'Inscription supprimée avec succès.');
}
}
