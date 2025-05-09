<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('publisher')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $publishers = Publisher::all();
        return view('books.create', compact('publishers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'year' => 'nullable|digits:4|integer',
            'publisher_id' => 'required|exists:publishers,id'
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Book created.');
    }

    public function edit(Book $book)
    {
        $publishers = Publisher::all();
        return view('books.edit', compact('book', 'publishers'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'year' => 'nullable|digits:4|integer',
            'publisher_id' => 'required|exists:publishers,id'
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted.');
    }
}
