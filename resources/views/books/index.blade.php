@extends('layouts.main')
@section('content')
    <div class="text-center h5">Hi all! The app will help you make a list of your books</div>
<div class="px-sm-5">
    <div class="mt-4 fs-5">To view or edit click on the name from the list:</div>

    @foreach($books as $book)
        <div>
            <a href="{{route('books.show', $book->id)}}">{{$book->id}}.{{$book->Name}}</a>
        </div>
    @endforeach

    <div class="mt-4">
        {{$books->withQueryString()->links()}}
    </div>
</div>
@endsection
