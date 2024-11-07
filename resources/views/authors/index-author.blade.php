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
                <th>Libros</th>
                @can('delete', $authors[0])
                    <th>Acciones</th>
                @endcan
            </tr>
        </thead>

        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>
                        <p> {{ $author->id }} </p>
                    </td>
                    
                    <td>
                        <a href="{{ route('author.show', $author) }}"> {{ $author->name }} </a>
                    </td>

                    <td>
                        <p> {{ $author->bio }} </p>
                    </td>

                    <td>
                        @foreach($author->books as $book)
                            <a href=" {{ route('book.show', $book) }} "> {{ $book->title }} </a>
                        @endforeach
                    </td>

                    @can('delete', $author)
                    <td>
                        <a href=" {{ route('author.edit', $author) }} ">Editar</a>

                        <form action=" {{ route('author.destroy', $author) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Estás seguro de eliminar a este autor?');">Eliminar</button>
                        </form>
                    </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>