<?php

namespace App\services\books;

use App\Models\Book;
use App\Models\BookTag;
use App\Models\Tag;

class Service
{
    public function store($data)
    {
        if (isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
            $book = Book::create($data);
            $book->tags()->attach($tags);
        } else {
            Book::create($data);
        }


    }
//hello:
    public function update($data, $book)
    {
        if (isset($data['tags'])) {
            $tags = $data['tags'];
            unset($data['tags']);
            $book->update($data);
            $book->tags()->sync($tags);
        } else {
            $book->update($data);
            $tags= BookTag::all();
            foreach ($tags as $tag){
                if($tag['book_id'] == $book['id']){
                    $tag->delete();
                }
            }
        }
    }
}
