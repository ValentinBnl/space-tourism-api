@extends('layouts.admin')

@section('title', 'Modifier Membre Équipage')

@section('content')
    <h2>Modifier le membre d'équipage</h2>

    <form method="POST" action="{{ route('admin.crews.update', $crew) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Nom:</label>
            <input type="text" name="name" value="{{ $crew->name }}" required>
        </div>

        <div>
            <label>Rôle:</label>
            <input type="text" name="role" value="{{ $crew->role }}" required>
        </div>

        <div>
            <label>Image URL:</label>
            <input type="text" name="image" value="{{ $crew->image }}">
        </div>

        <button type="submit">Mettre à jour</button>
    </form>
@endsection
