@extends('layouts.admin')

@section('title', 'Équipage')

@section('content')
    <h2>Liste des Membres d'équipage</h2>

    <a href="{{ route('admin.crews.create') }}">Ajouter un membre</a>

    <ul>
        @foreach ($crews as $crew)
            <li>
                <strong>{{ $crew->name }}</strong> - {{ $crew->role }}<br>
                <img src="{{ $crew->image }}" alt="{{ $crew->name }}" width="100"><br>

                <a href="{{ route('admin.crews.edit', $crew) }}">Modifier</a>

                <form action="{{ route('admin.crews.destroy', $crew) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
            <hr>
        @endforeach
    </ul>
@endsection
