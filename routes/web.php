<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;

Route::get('/', function () {
    return view('welcome');
});

// FINAL SETUP - 1 CLICK LANG
Route::get('/final-setup', function () {
    \Illuminate\Support\Facades\Artisan::call('migrate:fresh');
    $books = [
        ['title' => 'Noli Me Tangere', 'author' => 'Jose Rizal', 'isbn' => '978971100101', 'category' => 'Fiction', 'quantity' => 5, 'status' => 'Available'],
        ['title' => 'El Filibusterismo', 'author' => 'Jose Rizal', 'isbn' => '978971100102', 'category' => 'Fiction', 'quantity' => 5, 'status' => 'Available'],
        ['title' => 'Ibong Adarna', 'author' => 'Dela Cruz', 'isbn' => '978971100103', 'category' => 'Fiction', 'quantity' => 8, 'status' => 'Available'],
        ['title' => 'Florante at Laura', 'author' => 'Balagtas', 'isbn' => '978971100104', 'category' => 'Fiction', 'quantity' => 3, 'status' => 'Borrowed'],
        ['title' => 'General Science', 'author' => 'DepEd', 'isbn' => '978971100105', 'category' => 'Science', 'quantity' => 12, 'status' => 'Available'],
        ['title' => 'Philippine History', 'author' => 'Agoncillo', 'isbn' => '978971100106', 'category' => 'History', 'quantity' => 6, 'status' => 'Available'],
        ['title' => 'Math 101', 'author' => 'STEM', 'isbn' => '978971100107', 'category' => 'Tech', 'quantity' => 10, 'status' => 'Available'],
        ['title' => 'Computer Programming', 'author' => 'SBCI', 'isbn' => '978971100108', 'category' => 'Tech', 'quantity' => 4, 'status' => 'Borrowed'],
        ['title' => 'Biology', 'author' => 'Science', 'isbn' => '978971100109', 'category' => 'Science', 'quantity' => 7, 'status' => 'Available'],
        ['title' => 'World History', 'author' => 'Library', 'isbn' => '978971100110', 'category' => 'History', 'quantity' => 9, 'status' => 'Available'],
    ];
    foreach ($books as $b) {
        Book::create($b);
    }
    \App\Models\User::create([
        'name' => 'Admin SBCI',
        'email' => 'admin@sbci.edu',
        'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
        'role' => 'admin'
    ]);
    \App\Models\User::create([
        'name' => 'Student Juan',
        'email' => 'student@sbci.edu',
        'password' => \Illuminate\Support\Facades\Hash::make('student123'),
        'role' => 'borrower'
    ]);
    return "TAPOS NA LAHAT! <br>ADMIN: admin@sbci.edu / admin123 <br>BORROWER: student@sbci.edu / student123";
});

// FIX ROLE
Route::get('/fix-role', function () {
    $admin = App\Models\User::where('email', 'admin@sbci.edu')->first();
    if($admin){ $admin->role = 'admin'; $admin->save(); }
    $student = App\Models\User::where('email', 'student@sbci.edu')->first();
    if($student){ $student->role = 'borrower'; $student->save(); }
    return "AYOS NA! Admin = admin, Student = borrower.<br><a href='/books'>Punta ka na sa /books</a> - Dapat may ADD na!";
});

// ANALYTICS DASHBOARD
Route::get('/dashboard', function () {
    $total = Book::count();
    $available = Book::where('status', 'Available')->count();
    $borrowed = Book::where('status', 'Borrowed')->count();
    $totalQty = Book::sum('quantity');
    $categories = Book::all()->groupBy('category');
    $catLabels = [];
    $catCounts = [];
    foreach($categories as $cat => $books){
        $catLabels[] = $cat;
        $catCounts[] = count($books);
    }
    $statusLabels = ['Available', 'Borrowed'];
    $statusCounts = [$available, $borrowed];
    return view('dashboard', [
        'total' => $total,
        'available' => $available,
        'borrowed' => $borrowed,
        'totalQty' => $totalQty,
        'books' => Book::all(),
        'catLabels' => $catLabels,
        'catCounts' => $catCounts,
        'statusLabels' => $statusLabels,
        'statusCounts' => $statusCounts
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('books', BookController::class);

    // BORROW SYSTEM
    Route::post('/books/{id}/borrow', [BookController::class, 'borrow'])->name('books.borrow');
    Route::get('/borrowed', [BookController::class, 'borrowedList'])->name('books.borrowed');
    // RETURN SYSTEM - BAGONG DAGDAG
    Route::post('/borrowed/{id}/return', [BookController::class, 'returnBook'])->name('books.return');
});

require __DIR__.'/auth.php';