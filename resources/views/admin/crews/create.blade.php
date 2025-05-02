@extends('layouts.admin')

@section('title', 'Ajouter Membre Équipage')

@section('content')
    <h2>Ajouter un membre d'équipage</h2>

    <form method="POST" action="{{ route('admin.crews.store') }}">
        @csrf
        <div>
            <label>Nom:</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Rôle:</label>
            <input type="text" name="role" required>
        </div>

        <div>
            <label>Image URL:</label>
            <input type="text" name="image">
        </div>

        <button type="submit">Ajouter</button>
    </form>
@endsection
