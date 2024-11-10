<x-mail::message>
# Nuevo Libro Publicado

## {{ $book->title }}
### {{ $book->author->name }}


<x-mail::panel>
{{ $book->description }}
</x-mail::panel>

<x-mail::button :url="route('book.show', $book)">
Ver Libro
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
