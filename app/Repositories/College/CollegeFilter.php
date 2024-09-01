<?php

namespace App\Repositories\College;

use App\Infrastructure\Filters\BaseFilter;

class CollegeFilter extends BaseFilter
{
    /**
     * Filter is allowed with following parameters.
     *
     * @var array
     */
    protected $filters = ['keyword', 'university', 'type'];


    /**
     * keyword
     *
     * @return void
     */
    public function keyword()
    {
        if ($this->request->has('keyword')) {
            $this->builder->where('name', 'LIKE', '%' . $this->request->get('keyword') . '%');
        }
    }

    /**
     * college
     *
     * @return void
     */
    public function university()
    {
        if ($this->request->has('university')) {
            $this->builder->where('university', 'LIKE', '%' . $this->request->get('university') . '%');
        }
    }

    /**
     * type
     *
     * @return void
     */
    public function type()
    {
        if ($this->request->has('type')) {
            $this->builder->where('type', 'LIKE', '%' . $this->request->get('type') . '%');
        }
    }

}
