<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Autor</title>
</head>
<body>
    <h1>Ver Autor</h1>
    
    <form action="" method="">
        @csrf
        <label for="name">Nombre: </label> <br>
        <input disabled type="text" name="name" id="name" value="{{ old('name') ?? $author->name }}" required> <br> <br>
        @error('name')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

        <label for="bio">Biografía</label> <br>
        <textarea disabled name="bio" id="bio" cols="30" rows="10" required>{{ old('bio') ?? $author->bio}} </textarea> <br> <br>
        @error('bio')
             <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

        <a href=" {{ route('author.index') }} ">OK</a>

    </form>
</body>
</html>