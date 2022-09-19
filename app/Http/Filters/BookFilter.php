<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class BookFilter extends AbstractFilter
{
public const NAME='Name';
public const SHORT_DESCRIPTION='short_description';
public const NOTES_FOR_THE_FUTURE='notes_for_the_future';
public const CATEGORY_ID='category_id';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::SHORT_DESCRIPTION => [$this, 'shortDescription'],
            self::NOTES_FOR_THE_FUTURE => [$this, 'notesForTheFuture'],
            self::CATEGORY_ID => [$this, 'categoryId'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('Name', 'like', "%{$value}%");
    }

    public function shortDescription(Builder $builder, $value)
    {
        $builder->where('short_description', 'like', "%{$value}%");
    }
    public function notesForTheFuture(Builder $builder, $value)
    {
        $builder->where('notes_for_the_future', 'like', "%{$value}%");
    }
    public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id', $value);
    }
}
