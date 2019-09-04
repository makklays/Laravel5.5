<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\addBookRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::select('SELECT b.*, b.title FROM books b LEFT JOIN authors a ON (b.author_id=a.id)  '); // GROUP BY b.title

        //dd($books);
        $books = DB::table('books')
            ->leftJoin('authors', 'books.author_id', '=', 'authors.id')
            ->paginate(3);
        //dd($books);

        return View('books.index', [
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // просто отображаем форму для заполнения
        $authors = Author::all();

        return View('books.create', [
            'authors' => $authors,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(addBookRequest $request)
    {
        // dd($request->all());

        $book = new Book();
        $book->user_id = 11;
        $book->author_id = $request->author_id;
        $book->title = $request->title;
        $book->count_page = $request->count_page;
        $book->annotation = $request->annotation;
        $book->picture = $request->picture;
        $book->save();

        return redirect('/create-book')
                    ->with('flash_message', 'Книга успешно добавлена!')
                    ->with('flash_type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::where('id', $id)->first();
        //$author = Book::where('author_id', $book->id)->first();

        // dd($book);

        return View('books.show', [
            'book' => $book,
            //'author' => $author,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::where('id', $id)->first();
        $authors = Author::get();

        //dd(1);

        return View('books.edit', [
            'book' => $book,
            'authors' => $authors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(addBookRequest $request, $id)
    {
        $book = Book::where('id', $id)->first();
        $book->user_id = 11;
        $book->author_id = $request->author_id;
        $book->title = $request->title;
        $book->count_page = $request->count_page;
        $book->annotation = $request->annotation;
        $book->picture = $request->picture;
        $book->save();

        return redirect('/edit-book/'.$id)
            ->with('flash_message', 'Книга успешно отредактирована!')
            ->with('flash_type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllBooks()
    {
        return response()->json([
            'info' => 'API по предоставлению списка Книг от 04/09/2019',
            'data' => Book::orderBy('title', 'ASC')->get()
        ],200);
    }
}
