<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Add New Book</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-2">Title: <input type="text" name="title" class="form-control" required></div>
        <div class="mb-2">Author: <input type="text" name="author" class="form-control" required></div>
        <div class="mb-2">ISBN: <input type="text" name="isbn" class="form-control" required></div>
        <div class="mb-2">Category: <input type="text" name="category" class="form-control" required></div>
        <div class="mb-2">Quantity: <input type="number" name="quantity" class="form-control" required></div>
        <div class="mb-2">Status: 
            <select name="status" class="form-control">
                <option>Available</option>
                <option>Borrowed</option>
                <option>Reserved</option>
            </select>
        </div>
        <button class="btn btn-success">Save</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>