<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $books = Book::where('title', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%")
                ->orWhere('isbn', 'like', "%{$search}%")
                ->get();
        } else {
            $books = Book::all();
        }
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'category' => 'required',
            'quantity' => 'required|integer',
            'status' => 'required'
        ]);
        Book::create($request->all());
        return redirect()->route('books.index')->with('success','Book added!');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'category' => 'required',
            'quantity' => 'required|integer',
            'status' => 'required'
        ]);
        $book->update($request->all());
        return redirect()->route('books.index')->with('success','Book updated!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success','Book deleted!');
    }

    public function borrow($id)
    {
        $book = Book::findOrFail($id);
        if($book->quantity < 1) {
            return back()->with('error', 'No more copies available!');
        }
        $book->decrement('quantity');
        if($book->quantity == 0) {
            $book->status = 'Not Available';
            $book->save();
        }
        Borrow::create([
            'book_id' => $book->_id ?? $book->id,
            'book_title' => $book->title,
            'user_id' => auth()->id(),
            'user_name' => auth()->user()->name,
            'user_email' => auth()->user()->email,
            'status' => 'Borrowed',
            'borrowed_at' => now(),
            'return_date' => now()->addDays(7),
        ]);
        return back()->with('success', 'Successfully borrowed: ' . $book->title . ' - Please return in 7 days!');
    }

    public function borrowedList()
    {
        $borrows = Borrow::orderBy('borrowed_at', 'desc')->get();
        return view('books.borrowed', compact('borrows'));
    }

    // RETURN BOOK - BAGONG DAGDAG
    public function returnBook($id)
    {
        $borrow = Borrow::find($id);
        if (!$borrow) {
            return back()->with('error', 'Record not found!');
        }

        if ($borrow->status == 'Returned') {
            return back()->with('error', 'Already returned!');
        }

        // +1 quantity back sa book
        $book = Book::find($borrow->book_id);
        if ($book) {
            $book->increment('quantity');
            // Kung naging Available ulit
            if ($book->quantity > 0 && $book->status == 'Not Available') {
                $book->status = 'Available';
                $book->save();
            }
        }

        // Mark as returned
        $borrow->status = 'Returned';
        $borrow->returned_at = now();
        $borrow->save();

        return back()->with('success', 'Book returned: ' . $borrow->book_title);
    }
}