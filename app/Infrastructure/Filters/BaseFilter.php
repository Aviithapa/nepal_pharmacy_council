<?php

namespace App\Infrastructure\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class BaseFilter
 * @package App\Infrastructure\Filters
 */
abstract class BaseFilter
{
    /**
     * @var Builder $builder
     */
    protected $builder;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var
     */
    protected $filters;

    /**
     * BaseFilter constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;
        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, Str::camel($filter)) && !is_null($value)) {
                $method = Str::camel($filter);
                $this->$method($value);
            }
        }

        return $this->builder;
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->request->only($this->filters);
    }
}
