@extends('layouts.app')

@section('title', $gift->name)

@section('content')
    <p><a href="{{ route('gifts.index') }}">← Retour à la liste</a></p>

    <h1>{{ $gift->name }}</h1>

    <p><strong>Prix :</strong> {{ $gift->price }} €</p>

    @if ($gift->url)
        <p><strong>Lien :</strong> <a href="{{ $gift->url }}" target="_blank" rel="noopener">{{ $gift->url }}</a></p>
    @endif

    @if ($gift->details)
        <p><strong>Détails :</strong></p>
        <p>{{ $gift->details }}</p>
    @endif

    <p>
        <a href="{{ route('gifts.edit', $gift) }}">modifier</a>
    </p>
@endsection
