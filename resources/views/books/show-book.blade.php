<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver libro</title>
</head>
<body>
    <h1>Ver libro</h1>
    
    <form action="" method="">
        @csrf
        <label for="title">Título: </label> <br>
        <input disabled type="text" name="title" id="title" value="{{ old('title') ?? $book->title }}" required> <br> <br>
        @error('title')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

        <label for="description">Descripción</label> <br>
        <textarea disabled name="description" id="description" cols="30" rows="10" required>{{ old('description') ?? $book->description }}</textarea> <br> <br>
        @error('description')
             <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

        <label for="author_id">Autor</label>
        <select disabled name="author_id" id="author_id">
            <option value="Selecciona un autor"></option>
            @foreach ($authors as $author)
                <option value=" {{ $author->id }} "
                    {{ $book->author_id == $author->id ? 'selected' : ''}} >
                    {{ $author->name }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label for="genres">Géneros</label>
        <select disabled name="genres[]" id="genres" multiple>
            @foreach ($genres as $genre)
                <option value=" {{ $genre->id }} " 
                    @if($book->genres->contains($genre->id)) selected  @endif>
                {{ $genre->name }}
                </option>
            @endforeach
        </select>
        
        <br><br>

        <a href=" {{ route('book.index') }} ">OK</a>

    </form>
</body>
</html>