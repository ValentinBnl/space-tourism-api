@extends('layouts.admin')

@section('title', 'Créer une Destination')

@section('content')
    <h2>Créer une nouvelle Destination</h2>

    <form method="POST" action="{{ route('admin.destinations.store') }}">
        @csrf
        <div>
            <label>Nom:</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Description:</label>
            <textarea name="description" required></textarea>
        </div>

        <div>
            <label>Image URL:</label>
            <input type="text" name="image">
        </div>

        <button type="submit">Enregistrer</button>
    </form>
@endsection
