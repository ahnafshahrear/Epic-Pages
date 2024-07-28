@extends('layout')

@section('content')

<div class="d-flex justify-content-end mb-3">
    <a class="btn btn-dark" href="{{ route('books.create') }}">New Book</a>
</div>

<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td class="text-end">
                <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-outline-primary me-2">Details</a>
                <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-outline-success me-2">Update</a>
                <form method="post" action="{{ route('books.destroy', $book->id) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this book? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mx-auto p-2">
    {{ $books->links() }}
</div>

@endsection
