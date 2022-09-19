@extends('layouts.main')
@section('content')
    <div class="px-md-5">
        <form action="{{route('books.update', $book->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="Name" class="form-label h5">Book name</label>
                <input type="text" class="form-control" id="Name" name="Name"
                       placeholder="please write the title of the new book here" value="{{$book->Name}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label h5">Description</label>
                <input type="text" class="form-control" id="description" name="short_description"
                       placeholder="please write a short description" value="{{$book->short_description}}">
            </div>
            <div class="mb-3">
                <label for="note" class="form-label h5">Note for the future</label>
                <input type="text" class="form-control" id="note" name="notes_for_the_future"
                       placeholder="here you can write a short note" value="{{$book->notes_for_the_future}}">
            </div>
            <div class="mb-3">
                <label for="categories" class="form-label h5">Category</label>
                <select class="form-select" aria-label="Default select example" id="categories" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{$category->id === $book->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label h5">Tags</label>
                <select class="form-select" multiple aria-label="multiple select example" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                            @foreach($book->tags as $bookTag)
                                {{$bookTag->id === $tag->id ? 'selected' : ''}}
                            @endforeach
                            value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
                <div id="emailHelp" class="form-text">To select multiple tags, press Ctrl</div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
