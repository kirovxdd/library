<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $table='books';
    protected $guarded=[];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'book_tags', 'book_id', 'tag_id');
    }
}
