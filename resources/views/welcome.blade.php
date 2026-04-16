@extends('layouts.app')

@section('title', 'Liste des cadeaux')

@section('content')
    <h1>Liste des cadeaux</h1>

    <p><a href="{{ route('gifts.create') }}">Ajouter un cadeau</a></p>

    @if ($gifts->isEmpty())
        <p>Aucun cadeau pour le moment.</p>
    @else
        <ul>
            @foreach ($gifts as $gift)
                <li>
                    <strong>{{ $gift->name }}</strong> — {{ $gift->price }} €
                    <a href="{{ route('gifts.show', $gift) }}">voir</a>
                    <a href="{{ route('gifts.edit', $gift) }}">modifier</a>
                    <form action="{{ route('gifts.destroy', $gift) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
