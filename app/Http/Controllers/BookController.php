<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // dd($request);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'summary' => 'required|string|max:1000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('books-'  . date('Y') . date('m'));
        }

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('images'), $imageName);
        // }

        Book::create([
            'title' => $validated['title'],
            'category_id' => $validated['category'], // Foreign key field
            'stock' => $validated['stock'],
            'summary' => $validated['summary'],
            'image' => $validated['image'],
        ]);

        return redirect()->route('books.index')->with('success', 'Book has been successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /**
         * Buat code untuk validasi inputan user
         */

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'summary' => 'required|string|max:1000',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        /**
         * Ambil buku sesuai dengan id yang dikirim / lalu update berdasarkan perubahan yang dikirimkan user
         */
        $book = Book::findOrFail($id);

        if ($request->file('image')) {
            if ($book->image) {
                Storage::delete($book->image);
            }
            $validated['image'] = $request->file('image')->store('books-'  . date('Y') . date('m'));
        }
        // dd($validated);

        $book->update([
            'title' => $validated['title'],
            'category_id' => $validated['category'], // Foreign key field
            'stock' => $validated['stock'],
            'summary' => $validated['summary'],
            'image' => $validated['image'],
        ]);

        return redirect()->route('books.index')->with('success', 'Book has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        if ($book->image) {
            Storage::delete($book->image);
        }
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book has been successfully deleted!');
    }
}
