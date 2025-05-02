@extends('layouts.admin')

@section('title', 'Destinations')

@section('content')
    <h2>Liste des Destinations</h2>

    <a href="{{ route('admin.destinations.create') }}">Créer une nouvelle destination</a>

    <ul>
        @foreach ($destinations as $destination)
            <li>
                <strong>{{ $destination->name }}</strong><br>
                {{ $destination->description }}<br>
                <img src="{{ $destination->image }}" alt="{{ $destination->name }}" width="100"><br>

                <a href="{{ route('admin.destinations.edit', $destination) }}">Modifier</a>

                <form action="{{ route('admin.destinations.destroy', $destination) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
            <hr>
        @endforeach
    </ul>
@endsection
