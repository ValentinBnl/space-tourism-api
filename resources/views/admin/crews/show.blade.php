@extends('layouts.app')

@section('content')
    <h1>{{ $crew->name }}</h1>

    <p><strong>Rôle :</strong> {{ $crew->role }}</p>
    <p>{{ $crew->bio }}</p>

    @if($crew->image)
        <img src="{{ $crew->image }}" alt="{{ $crew->name }}" style="max-width: 300px;">
    @endif

    <a href="{{ route('admin.crews.edit', $crew) }}">Modifier</a>

    <form action="{{ route('admin.crews.destroy', $crew) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Confirmer suppression ?')">Supprimer</button>
    </form>
@endsection
