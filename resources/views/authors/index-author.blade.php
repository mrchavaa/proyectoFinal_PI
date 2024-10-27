<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Author</title>
</head>
<body>
    <h1>Listado de autores registrados</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Autor</th>
                <th>Biografía</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>
                        <p> {{ $author->id }} </p>
                    </td>
                    
                    <td>
                        <p> {{ $author->name }} </p>
                    </td>

                    <td>
                        <p> {{ $author->bio }} </p>
                    </td>

                    <td>
                        <a href=" {{ route('author.edit', $author) }} ">Editar</a>

                        <form action=" {{ route('author.destroy', $author) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar a este autor?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>