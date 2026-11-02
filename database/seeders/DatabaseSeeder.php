<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['title' => 'El Filibusterismo', 'author' => 'Jose Rizal', 'isbn' => '978971100102', 'category' => 'Fiction', 'quantity' => 5, 'status' => 'Available'],
            ['title' => 'Ibong Adarna', 'author' => 'Jose Dela Cruz', 'isbn' => '978971100103', 'category' => 'Fiction', 'quantity' => 8, 'status' => 'Available'],
            ['title' => 'Florante at Laura', 'author' => 'Francisco Balagtas', 'isbn' => '978971100104', 'category' => 'Fiction', 'quantity' => 3, 'status' => 'Borrowed'],
            ['title' => 'General Science', 'author' => 'DepEd', 'isbn' => '978971100105', 'category' => 'Science', 'quantity' => 12, 'status' => 'Available'],
            ['title' => 'Philippine History', 'author' => 'Teodoro Agoncillo', 'isbn' => '978971100106', 'category' => 'History', 'quantity' => 6, 'status' => 'Available'],
            ['title' => 'Math 101', 'author' => 'STEM Press', 'isbn' => '978971100107', 'category' => 'Tech', 'quantity' => 10, 'status' => 'Available'],
            ['title' => 'Computer Programming', 'author' => 'SBCI IT Dept', 'isbn' => '978971100108', 'category' => 'Tech', 'quantity' => 4, 'status' => 'Borrowed'],
            ['title' => 'Biology Today', 'author' => 'Science Org', 'isbn' => '978971100109', 'category' => 'Science', 'quantity' => 7, 'status' => 'Available'],
            ['title' => 'World History', 'author' => 'Rizal Library', 'isbn' => '978971100110', 'category' => 'History', 'quantity' => 9, 'status' => 'Available'],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}