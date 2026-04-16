<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau cadeau</title>
</head>
<body>
    <p><a href="{{ route('gifts.index') }}">← Retour à la liste</a></p>

    <h1>Nouveau cadeau</h1>

    <form action="{{ route('gifts.store') }}" method="POST">
        @csrf

        <p>
            <label for="name">Nom</label><br>
            <input type="text" id="name" name="name" value="{{ old('name') }}" minlength="3" maxlength="50" required>
            @error('name')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </p>

        <p>
            <label for="url">URL</label><br>
            <input type="url" id="url" name="url" value="{{ old('url') }}" pattern="https?://.*" required>
            @error('url')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </p>

        <p>
            <label for="details">Détails</label><br>
            <textarea id="details" name="details" rows="4">{{ old('details') }}</textarea>
            @error('details')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </p>

        <p>
            <label for="price">Prix</label><br>
            <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" min="0" required>
            @error('price')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </p>

        <p>
            <button type="submit">Créer</button>
        </p>
    </form>
</body>
</html>
