@extends('layout')

@section('title', 'Nouvelle Inscription - Psycho Praticien')

@section('content')
<div class="container">
    <header>
        <h1>Nouvelle Inscription</h1>
        <p>Ajouter un nouveau participant à la formation "Psycho Praticien".</p>
    </header>

    <form action="{{ route('inscriptions.store') }}" method="POST" class="inscription-form">
        @csrf

        <div class="form-group">
            <label for="nom">Nom complet</label>
            <input type="text" id="nom" name="nom" placeholder="Ex: Jean Dupont" value="{{ old('nom') }}" required>
            @error('nom') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" placeholder="Ex: jean.dupont@email.com" value="{{ old('email') }}" required>
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="tel" id="telephone" name="telephone" placeholder="Ex: 06 12 34 56 78" value="{{ old('telephone') }}">
            @error('telephone') <div class="error">{{ $message }}</div> @enderror
        </div>
        
        <div class="form-group">
            <label for="date_inscription">Date d'inscription</label>
            <input type="date" id="date_inscription" name="date_inscription" value="{{ old('date_inscription') }}" required>
            @error('date_inscription') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="statut">Statut de l'inscription</label>
            <select id="statut" name="statut" required>
                <option value="en_attente" {{ old('statut') == 'en_attente' ? 'selected' : '' }}>En attente de paiement</option>
                <option value="validee" {{ old('statut') == 'validee' ? 'selected' : '' }}>Validée</option>
                <option value="dossier_incomplet" {{ old('statut') == 'dossier_incomplet' ? 'selected' : '' }}>Dossier incomplet</option>
                <option value="annulee" {{ old('statut') == 'annulee' ? 'selected' : '' }}>Annulée</option>
            </select>
            @error('statut') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Enregistrer l'inscription</button>
            <a href="{{ route('inscriptions.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection