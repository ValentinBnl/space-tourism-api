@extends('layouts.admin')

@section('title', 'Modifier une Destination')

@section('content')
    <h2>Modifier la Destination</h2>

    <form method="POST" action="{{ route('admin.destinations.update', $destination) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Nom:</label>
            <input type="text" name="name" value="{{ $destination->name }}" required>
        </div>

        <div>
            <label>Description:</label>
            <textarea name="description" required>{{ $destination->description }}</textarea>
        </div>

        <div>
            <label>Image URL:</label>
            <input type="text" name="image" value="{{ $destination->image }}">
        </div>

        <button type="submit">Mettre à jour</button>
    </form>
@endsection
