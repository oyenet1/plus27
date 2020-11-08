<?php

namespace App\Http\Controllers;

use App\Book;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::withoutTrashed()->get();
        return view('book.index', compact(['books']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $books = Book::withoutTrashed()->get();
        return view('book.create', compact(['books']));
    }

    public function trash()
    {
        $books = Book::onlyTrashed()->get();
        return view('book.trash', compact(['books']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'cover' => ['required', 'mimes:jpeg,bmp,png,jpg,gif', 'max:512'],
            'sales' => ['nullable', 'numeric'],
            'author' => 'required',
            'price' => ['required', 'integer']
        ]);

        if (request()->hasFile('cover')) {
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $file->move('image/book/', $imageName);
        }

        $books = Book::create(array_merge(
            $data,
            ['cover' => $imageName]
        ));

        return redirect()->route('book.index')->with('success', 'Book Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'name' => 'required',
            'cover' => ['required', 'mimes:jpeg,bmp,png,jpg,gif', 'max:512'],
            'sales' => ['nullable', 'numeric'],
            'author' => 'required',
            'price' => ['required', 'integer']
        ]);

        if (request()->hasFile('cover')) {
            $file = $request->file('cover');
            $extension = $file->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $file->move('image/book/', $imageName);
        }

        $book = $book->update(array_merge( $data,
            ['cover' => $imageName]
        ));

        return redirect()->route('book.index')->with('success', 'Book has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */

    //  forcedelete
    public function clear(Book $book)
    {
        $book = $book->forceDelete();
        return redirect()->back()->with('success', 'Book has been permanently deleted');
    }
    public function destroy(Book $book)
    {
        $book = $book->delete();
        return redirect()->route('book.index')->with('success', 'Book has been deleted temporary, click on achieved to view it');
    }
}
