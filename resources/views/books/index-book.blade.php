<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Book</title>
</head>
<body>
    <h1>Listado de libros registrados</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Autor</th>
                <th>Género(s)</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>
                        <p> {{ $book->id }} </p>
                    </td>
                    
                    <td>
                        <p> {{ $book->title }} </p>
                    </td>

                    <td>
                        <p> {{ $book->description }} </p>
                    </td>

                    <td>
                        <p> {{ $book->author->name }} </p>
                    </td>

                    <td>
                        @foreach($book->genres as $genre)
                            {{ $genre->name }}
                        @endforeach
                    </td>

                    <td>
                        @canany(['delete', 'update'], $book)
                            <a href=" {{ route('book.edit', $book) }} ">Editar</a>

                            <form action=" {{ route('book.destroy', $book) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este libro?');">Eliminar</button>
                            </form>   
                        @endcanany

                        @cannot(['delete', 'update'], $book)
                            <p> No eres el propietario </p>
                        @endcannot
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>