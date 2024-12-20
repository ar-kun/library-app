<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
        // return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'summary' => 'required|string|max:1000',
        ]);

        Book::create([
            'title' => $validated['title'],
            'category_id' => $validated['category'], // Foreign key field
            'stock' => $validated['stock'],
            'summary' => $validated['summary'],
            'image' => 'https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg'
        ]);

        return redirect()->route('books.index')->with('success', 'Book has been successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}