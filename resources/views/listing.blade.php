@extends('layout')

@section('title', 'Liste des Inscriptions - Psycho Praticien')

@section('content')
<div class="container">
    <header>
        <h1>Gestion des Inscriptions</h1>
        <p>Formation "Psycho Praticien"</p>
    </header>
<form method="GET" action="{{ route('inscriptions.index') }}" class="filters-inline">
    <div class="toolbar">

        

            <div class="search-bar">
                <input type="text" name="search" placeholder="Rechercher par nom ou e-mail..."
       value="{{ request('search') }}"
       oninput="delayedSubmit(this.form)">
            </div>

            <div class="filters">
               <select name="statut" onchange="this.form.submit()">
    <option value="">Tous les statuts</option>
    <option value="validee" {{ request('statut')=='validee'?'selected':'' }}>Validée</option>
    <option value="en_attente" {{ request('statut')=='en_attente'?'selected':'' }}>En attente</option>
    <option value="dossier_incomplet" {{ request('statut')=='dossier_incomplet'?'selected':'' }}>Dossier incomplet</option>
</select>
            </div>
            
            
            <a href="{{ route('inscriptions.create') }}" class="btn btn-primary">Ajouter une inscription</a>
        
    </div>
</form>
    <div class="listing-container">
        <table>
            <thead>
                <tr>
                    <th>Priorité</th>
                    <th>Nom du participant</th>
                    <th>Contact</th>
                    <th>Date d'inscription</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($inscriptions as $i)
                @php
                    $statutClass = match($i->statut) {
                        'validee' => 'statut-validee',
                        'en_attente' => 'statut-en-attente',
                        'dossier_incomplet' => 'statut-dossier-incomplet',
                        default => '',
                    };
                @endphp
                <tr class="{{ $statutClass }} {{ $i->prioritaire ? 'prioritaire' : '' }}">
                    <td class="priorite">
                        <form action="{{ route('inscriptions.togglePriorite', $i) }}" method="POST">
                            @csrf
                            <button title="{{ $i->prioritaire ? 'Retirer la priorité' : 'Mettre en avant' }}" class="{{ $i->prioritaire ? 'active' : '' }}">
                                {{ $i->prioritaire ? '★' : '☆' }}
                            </button>
                        </form>
                    </td>
                    <td>{{ $i->nom }}</td>
                    <td>{{ $i->email }}</td>
                    <td>{{ $i->created_at->format('d/m/Y') }}</td>
                    <td><span class="badge">
                        {{ $i->statut === 'validee' ? 'Validée' : ($i->statut === 'en_attente' ? 'En attente' : 'Dossier incomplet') }}
                    </span></td>
     <td class="actions">
        <a href="{{ route('inscriptions.edit', $i) }}">Modifier</a>

            <form action="{{ route('inscriptions.destroy', $i) }}" method="POST"        style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="link-button" onclick="return confirm('Supprimer cette inscription ?')">
                    Supprimer
                </button>
            </form>
    </td>
                </tr>
            @empty
                <tr><td colspan="6">Aucune inscription trouvée.</td></tr>
            @endforelse
            </tbody>
        </table>

        <!-- Bonus: pagination 10 / page -->
        <div class="pagination">
            {{ $inscriptions->links() }}
        </div>
    </div>

    
</div>
@endsection
