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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //$books = DB::select('SELECT b.*, b.title FROM books b LEFT JOIN authors a ON (b.author_id=a.id)  '); // GROUP BY b.title
        $books = DB::table('books')
            ->select('books.*')
            ->leftJoin('authors', 'books.author_id', '=', 'authors.id')
            ->paginate(3);

        return View('books.index', [
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @param addBookRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(addBookRequest $request)
    {
        //$path = $request->picture->path();
        //$extension = $request->picture->extension();
        //if ($request->file('photo')->isValid()) {
            //
        //}

        $fileName = "pic-".date('d_m_Y_H_I_s',time()).'.'.request()->picture->getClientOriginalExtension();
        $request->picture->storeAs('books', $fileName);

        $book = new Book();
        $book->user_id = 11;
        $book->author_id = $request->author_id;
        $book->title = $request->title;
        $book->count_page = $request->count_page;
        $book->annotation = $request->annotation;
        $book->picture = $fileName;
        $book->save();

        return redirect('/create-book')
                    ->with('flash_message', 'Книга успешно добавлена!')
                    ->with('flash_type', 'success');
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $book = Book::where('id', $id)->first();
        //$author = Book::where('author_id', $book->id)->first();

        return View('books.show', [
            'book' => $book,
            //'author' => $author,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $book = Book::where('id', $id)->first();
        $authors = Author::get();

        return View('books.edit', [
            'book' => $book,
            'authors' => $authors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param addBookRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(addBookRequest $request, $id)
    {
        $fileName = "pic-".date('d_m_Y_H_I_s',time()).'.'.request()->picture->getClientOriginalExtension();
        $request->picture->storeAs('books', $fileName);

        $book = Book::where('id', $id)->first();
        $book->user_id = 11;
        $book->author_id = $request->author_id;
        $book->title = $request->title;
        $book->count_page = $request->count_page;
        $book->annotation = $request->annotation;
        $book->picture = $fileName;
        $book->save();

        return redirect('/edit-book/'.$id)
            ->with('flash_message', 'Книга успешно отредактирована!')
            ->with('flash_type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     */
    public function destroy($id)
    {
        //
    }

    /**
     * For API
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllBooks()
    {
        return response()->json([
            'info' => 'API по предоставлению списка Книг.',
            'data' => Book::orderBy('title', 'ASC')->get()
        ],200);
    }

    /**
     * For API
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBook($id)
    {
        return response()->json([
            'info' => 'API по предоставлению информации о Книге.',
            'data' => Book::where('id', $id)->first()
        ],200);
    }

    /**
     * For API
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMyBooks()
    {
        $user_id = auth()->id();
        if (!isset($user_id) || empty($user_id)) {
            return response()->json([
                'info' => 'API по предоставлению списка Книг, который добавил пользователь.',
                'error' => 'ОШИБКА! Только для авторизованных пользователей',
            ], 404);
        }
        return response()->json([
            'info' => 'API по предоставлению списка Книг, который добавил пользователь.',
            'data' => Book::where('user_id', auth()->id())->first()
        ],200);
    }
}
