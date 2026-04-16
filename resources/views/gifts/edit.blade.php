<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier {{ $gift->name }}</title>
</head>

<body>
    <p><a href="{{ route('gifts.show', $gift) }}">← Retour au cadeau</a></p>

    <h1>Modifier le cadeau</h1>

    <form action="{{ route('gifts.update', $gift) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="name">Nom</label><br>
            <input type="text" id="name" name="name" value="{{ old('name', $gift->name) }}" minlength="3"
                maxlength="51" required>
            @error('name')
            <p style="color:red">{{ $message }}</p>
        @enderror
        </p>

        <p>
            <label for="url">URL</label><br>
            <input type="url" id="url" name="url" value="{{ old('url', $gift->url) }}"
                pattern="https?://.*" required>
            @error('url')
            <p style="color:red">{{ $message }}</p>
        @enderror
        </p>

        <p>
            <label for="details">Détails</label><br>
            <textarea id="details" name="details" rows="4">{{ old('details', $gift->details) }}</textarea>
            @error('details')
            <p style="color:red">{{ $message }}</p>
        @enderror
        </p>

        <p>
            <label for="price">Prix</label><br>
            <input type="number" id="price" name="price" value="{{ old('price', $gift->price) }}" step="0.01"
                min="0" required>
            @error('price')
            <p style="color:red">{{ $message }}</p>
        @enderror
        </p>

        <p>
            <button type="submit">Enregistrer</button>
        </p>
    </form>
</body>

</html>
