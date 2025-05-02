@extends('layouts.app')

@section('content')
    <h1>{{ $destination->name }}</h1>

    <p>{{ $destination->description }}</p>

    @if($destination->image)
        <img src="{{ $destination->image }}" alt="{{ $destination->name }}" style="max-width: 300px;">
    @endif

    <a href="{{ route('admin.destinations.edit', $destination) }}">Modifier</a>

    <form action="{{ route('admin.destinations.destroy', $destination) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
    </form>
@endsection
