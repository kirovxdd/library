@extends('layouts.main')
@section('content')
    <div class="px-md-5">
        <form action="{{route('books.index')}}" method="get">
            @csrf
            <div class="h4 py-md-4">To search, fill in any field</div>
            <div class="mb-3">
                <label for="Name" class="form-label h5">Book name</label>
                <input type="text" class="form-control" id="Name" name="Name"
                       placeholder="please write the title of the book">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label h5">Description</label>
                <input type="text" class="form-control" id="description"
                       name="short_description"
                       placeholder="please write a short description">
            </div>
            <div class="mb-3">
                <label for="note" class="form-label h5">Note for the future</label>
                <input type="text" class="form-control" id="note"
                       name="notes_for_the_future"
                       placeholder="here you can write a short note">
            </div>
            <div class="mb-3">
                <label for="categories" class="form-label h5">Category</label>
                <select class="form-select" aria-label="Default select example" id="categories" name="category_id">
                    <option selected>  </option>
                    @foreach($categories as $category)
                        <option
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
@endsection
