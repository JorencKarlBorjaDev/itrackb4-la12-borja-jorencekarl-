<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Book;
use App\Models\Genre;



class BookController extends Controller
{
    
   public function index(Request $request)
   {
       $genreId = $request->query('genre_id');
       $year = $request->query('year');

       $genres = Genre::all();
      
       $query = Book::with('genre');

     if ($genreId !== null) {
        $query->where('genre_id', $genreId);
    }

     if ($year !== null) {
        $query->where('year', $year);
    }

        $books = $query->get();

        return view('books.index', compact('books', 'genreId', 'year', 'genres'));
    }

    
    public function create()
    {
        $genres = Genre::all();

        return view('books.create', compact('genres'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'year' => 'required|numeric|min:1000|max:2026',
        'genre_id' => 'required|exists:genres,id',
        'is_available' => 'required|boolean',
    ]);


        $book = Book::create($validated);

    Log::info('Book saved', [
        'id' => $book->id,
    ]);

    return redirect()->route('books.index')
        ->with('success', 'Book added successfully!');
    }
    
    
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }
    

    public function edit(Book $book)
    {
        $genres = Genre::all();

        return view('books.edit', compact('book', 'genres'));
    }

    
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'year' => 'required|numeric|min:1000|max:2026',
        'genre_id' => 'required|exists:genres,id',
        'is_available' => 'required|boolean',
    ]);
        $book->update($validated);

        return redirect()->route('books.index')
           ->with('success', 'Book updated successfully!');
    }


    public function destroy(Book $book)
    {
        abort_if($book->genre->books()->count() === 1, 403);

         $book->delete();

        return redirect()->route('books.index')
         ->with('success', 'Book deleted successfully!');
    }

    
    public function featured()
    {
         $book = Book::findOrFail(1);

        return view('books.featured', compact('book'));
    }
    
   
   
}

