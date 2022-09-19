@extends('layouts.main')
@section('content')
    <div class="px-md-5">
        <div>
            <h4>{{$book->Name}}</h4>
            <h5><b>description:</b> {{$book->short_description}}</h5>
            <h5><b>notes for the future:</b> {{$book->notes_for_the_future}}</h5>
            <h5><b>category:</b> {{$book->category->title}}</h5>
            <h5><b>tag:</b> @foreach($book->tags as $tag)
                    #{{$tag->title}}
                @endforeach</h5>
        </div>
        <div class="pt-md-3"><h5><a href="{{route('books.edit', $book->id)}}">Edit</a></h5></div>
        <div class="pt-md-3"><h5><a href="{{route('books.index')}}">Back</a></h5></div>
        <div class="pt-md-3">
            <form action="{{route('books.destroy', $book->id)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="delete" class="bg-primary border-primary rounded text-white">
            </form>
        </div>
    </div>
@endsection
