<?php

namespace App\Support\Traits;

trait Filterable
{
    /**
     * Scope a query to filter by string
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, $keyword)
    {
        if (!is_string($keyword) || empty($keyword) || !isset(static::$filterable)) {
            return $query;
        }

        foreach (static::$filterable as $field) {
            $query->orWhere($field, 'LIKE', "%$keyword%");
        }

        return $query;
    }
}
