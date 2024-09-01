<?php

namespace App\Repositories\News;

use App\Infrastructure\Filters\BaseFilter;

class NewsFilter extends BaseFilter
{
    /**
     * Filter is allowed with following parameters.
     *
     * @var array
     */
    protected $filters = ['keyword'];


    /**
     * keyword
     *
     * @return void
     */
    public function keyword()
    {
        if ($this->request->has('keyword')) {
            $this->builder->where('title', 'LIKE', '%' . $this->request->get('keyword') . '%');
        }
    }

}
