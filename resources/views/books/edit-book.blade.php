<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar libro</title>
</head>
<body>
    <h1>Editar libro</h1>
    
    <form action=" {{ route('book.update', $book) }} " method="POST">
        @csrf
        @method('PATCH')
        <label for="title">Título: </label> <br>
        <input type="text" name="title" id="title" value="{{ old('title') ?? $book->title }}" required minlength="10"> <br> <br>
        @error('title')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

        <label for="description">Descripción</label> <br>
        <textarea name="description" id="description" cols="30" rows="10" required minlength="100">{{ old('description') ?? $book->description }}</textarea> <br> <br>
        @error('description')
             <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

        <label for="author">Autor</label>
        <select name="author_id" id="author_id" required>
            @foreach ($authors as $author)
                <option value=" {{ $author->id }} "
                    {{ $book->author_id == $author->id ? 'selected' : '' }} >
                     {{ $author->name }}
                </option>
            @endforeach
        </select>

        <label for="genres">Géneros</label>
        <select name="genres[]" id="genres" multiple>
            @foreach ($genres as $genre)
                <option value=" {{ $genre->id }} " 
                    @if($book->genres->contains($genre->id)) selected  @endif>
                {{ $genre->name }}
                </option>
            @endforeach
        </select>
        

        <br><br>

        <button type="submit" id="btnSendForm">Guardar</button>
    </form>
</body>
</html>