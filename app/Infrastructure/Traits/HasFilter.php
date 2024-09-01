<?php

namespace App\Infrastructure\Traits;

use App\Infrastructure\Filters\BaseFilter;

trait HasFilter
{
    public function scopeFilter($query, BaseFilter $filters)
    {
        return $filters->apply($query);
    }
}
