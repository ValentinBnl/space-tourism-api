@extends('layouts.admin')

@section('title', 'Ajouter Technologie')

@section('content')
    <h2>Ajouter une technologie</h2>

    <form method="POST" action="{{ route('admin.technologies.store') }}">
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

        <button type="submit">Ajouter</button>
    </form>
@endsection
