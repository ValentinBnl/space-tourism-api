@extends('layouts.app')

@section('content')
    <h1>{{ $technology->name }}</h1>

    <p>{{ $technology->description }}</p>

    @if($technology->image)
        <img src="{{ $technology->image }}" alt="{{ $technology->name }}" style="max-width: 300px;">
    @endif

    <a href="{{ route('admin.technologies.edit', $technology) }}">Modifier</a>

    <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Confirmer suppression ?')">Supprimer</button>
    </form>
@endsection
