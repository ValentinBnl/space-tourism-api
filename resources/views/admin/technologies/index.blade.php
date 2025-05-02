@extends('layouts.admin')

@section('title', 'Technologies')

@section('content')
    <h2>Liste des Technologies</h2>

    <a href="{{ route('admin.technologies.create') }}">Ajouter une technologie</a>

    <ul>
        @foreach ($technologies as $technology)
            <li>
                <strong>{{ $technology->name }}</strong><br>
                {{ $technology->description }}<br>
                <img src="{{ $technology->image }}" alt="{{ $technology->name }}" width="100"><br>

                <a href="{{ route('admin.technologies.edit', $technology) }}">Modifier</a>

                <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
            <hr>
        @endforeach
    </ul>
@endsection

