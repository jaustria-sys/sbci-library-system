<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Book</h2>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-2">Title: <input type="text" name="title" value="{{ $book->title }}" class="form-control" required></div>
        <div class="mb-2">Author: <input type="text" name="author" value="{{ $book->author }}" class="form-control" required></div>
        <div class="mb-2">ISBN: <input type="text" name="isbn" value="{{ $book->isbn }}" class="form-control" required></div>
        <div class="mb-2">Category: <input type="text" name="category" value="{{ $book->category }}" class="form-control" required></div>
        <div class="mb-2">Quantity: <input type="number" name="quantity" value="{{ $book->quantity }}" class="form-control" required></div>
        <div class="mb-2">Status: 
            <select name="status" class="form-control">
                <option {{ $book->status == 'Available' ? 'selected' : '' }}>Available</option>
                <option {{ $book->status == 'Borrowed' ? 'selected' : '' }}>Borrowed</option>
                <option {{ $book->status == 'Reserved' ? 'selected' : '' }}>Reserved</option>
            </select>
        </div>
        <button class="btn btn-success">Update</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>