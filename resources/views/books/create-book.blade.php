<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Libro</title>
</head>
<body>
    <h1>Alta de libro</h1>
    
    <form action=" {{ route('book.store') }} " method="POST">
        @csrf
        <label for="title">Título: </label> <br>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required minlength="10"> <br> <br>
        @error('title')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

        <label for="description">Descripción</label> <br>
        <textarea name="description" id="description" cols="30" rows="10" required minlength="100">{{ old('description') }}</textarea> <br> <br>
        @error('description')
             <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

        <label for="author_id">Autor</label>
        <select name="author_id" id="author_id" required>
            @foreach ($authors as $author)
                <option value=" {{ $author->id }} "> {{ $author->name }} </option>
            @endforeach
        </select>
        <br><br>

        <button type="submit" id="btnSendForm">Guardar Libro</button>
    </form>
</body>
</html>