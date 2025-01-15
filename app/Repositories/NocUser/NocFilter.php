<?php

namespace App\Repositories\NocUser;

use App\Infrastructure\Filters\BaseFilter;

class NocFilter extends BaseFilter
{
    /**
     * Filter is allowed with following parameters.
     *
     * @var array
     */
    protected $filters = ['keyword', 'status', 'good_standing'];


    /**
     * keyword
     *
     * @return void
     */
    public function keyword()
    {
        if ($this->request->has('keyword')) {
            $keyword = $this->request->get('keyword');
            $keywords = explode(' ', $keyword); // Split the input by spaces

            $this->builder->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->where(function ($subQuery) use ($word) {
                        $subQuery->where('first_name', 'LIKE', '%' . $word . '%')
                                ->orWhere('middle_name', 'LIKE', '%' . $word . '%')
                                ->orWhere('last_name', 'LIKE', '%' . $word . '%');
                    });
                }
            });
        }
    }

    public function status()
    {
        if ($this->request->has('status')) {
            $this->builder->where('status', 'LIKE', '%' . $this->request->get('status') . '%');
        }
    }

    public function citizenship()
    {
        if ($this->request->has('citizenship')) {
            $this->builder->where('citizenship', 'LIKE', '%' . $this->request->get('citizenship') . '%');
        }
    }

    public function goodStanding()
    {
        if ($this->request->has('good_standing')) {
            $this->builder->where('good_standing', 'LIKE', '%' . $this->request->get('good_standing') . '%');
        }
    }

}
