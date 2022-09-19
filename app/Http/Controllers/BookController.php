<?php

namespace App\Http\Controllers;

use App\Http\Filters\BookFilter;
use App\Http\Requests\Book\FilterRequest;
use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Book;
use App\Models\BookTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BookController extends BaseController
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(BookFilter::class, ['queryParams' => array_filter($data)]);
        $books = Book::filter($filter)->paginate(5);

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('books.create', compact('categories', 'tags'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('books.edit', compact('categories', 'tags', 'book'));
    }

    public function update(UpdateRequest $request, Book $book)
    {
        $data = $request->validated();

        $this->service->update($data, $book);

        return redirect()->route('books.show', $book->id);
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }

    public function search()
    {
        $categories = Category::all();
        return view('books.search', compact('categories'));
    }

}
