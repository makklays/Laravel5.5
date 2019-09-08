<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $authors = Author::paginate(3);

        return View('authors.index', [
            'authors' => $authors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $author = Author::where('id', $id)->first();
        $books = Book::where('author_id', $id)->get();

        return View('authors.show', [
            'books' => $books,
            'author' => $author,
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
        //
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
        //
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

    /**
     * For API
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllAuthors()
    {
        return response()->json([
            'info' => 'API по предоставлению списка Авторов.',
            'data' => Author::orderBy('lastname', 'ASC')
                ->orderBy('firstname', 'ASC')
                ->get()
        ],200);
    }

    /**
     * For API
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthor($id)
    {
        return response()->json([
            'info' => 'API по предоставлению инфо об Авторе.',
            'data' => Author::where('id', $id)->first()
        ],200);
    }

    /**
     * For API
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBooksByAuthorId($id)
    {
        return response()->json([
            'info' => 'API по предоставлению списка книг конкретного автора.',
            'data' => Book::where('author_id', $id)->get()
        ],200);
    }
}
