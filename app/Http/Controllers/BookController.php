<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
// use App\Models\User\Role;
// use App\Models\User\Permission;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $books = Book::orderBy('id', 'DESC')->get();
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
         }
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
         }
        $book = Book::create(
            [
                'name' => $request->book_name,
                'price' => $request->book_price,
                'publitiondate' => $request->book_pubdate,
            ]);
            return redirect()->route('book.index')->with('success', 'record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        if (Gate::allows('isReader')) {
            abort(403);
         }
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::allows('isReader')) {
            abort(403);
         }
        $book = Book::find($id);
        $book->update(
            [
                'name' => $request->book_name,
                'price' => $request->book_price,
                'publitiondate' => $request->book_pubdate,
            ]);
            return redirect()->route('book.index')->with('success', 'record update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if (!Gate::allows('isAdmin')) {
            abort(403);
         }
        $book->delete();
        return redirect()->route('book.index')->with('success', 'record deleted successfully');
    }
}
