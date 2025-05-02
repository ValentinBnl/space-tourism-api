@extends('layouts.admin')

@section('title', 'Modifier Technologie')

@section('content')
    <h2>Modifier la technologie</h2>

    <form method="POST" action="{{ route('admin.technologies.update', $technology) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Nom:</label>
            <input type="text" name="name" value="{{ $technology->name }}" required>
        </div>

        <div>
            <label>Description:</label>
            <textarea name="description" required>{{ $technology->description }}</textarea>
        </div>

        <div>
            <label>Image URL:</label>
            <input type="text" name="image" value="{{ $technology->image }}">
        </div>

        <button type="submit">Mettre à jour</button>
    </form>
@endsection
