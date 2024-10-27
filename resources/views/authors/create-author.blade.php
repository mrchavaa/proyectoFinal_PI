<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Autor</title>
</head>
<body>
    <h1>Alta de autor</h1>
    
    <form action="  {{ route('author.store') }} " method="POST">
        @csrf
        <label for="name">Nombre: </label> <br>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required> <br> <br>
        @error('name')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

        <label for="bio">Biografía</label> <br>
        <textarea name="bio" id="bio" cols="30" rows="10" required>{{ old('bio') }}</textarea> <br> <br>
        @error('bio')
             <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

        <button type="submit" id="btnSendForm">Guardar</button>
    </form>
</body>
</html>