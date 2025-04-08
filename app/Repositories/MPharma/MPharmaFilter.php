<?php

namespace App\Repositories\MPharma;

use App\Infrastructure\Filters\BaseFilter;

class MPharmaFilter extends BaseFilter
{
    /**
     * Filter is allowed with following parameters.
     *
     * @var array
     */
    protected $filters = ['keyword', 'status', 'npc_registration_number'];


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

    public function npcRegistrationNumber()
    {
        if ($this->request->has('npc_registration_number')) {
            $this->builder->where('npc_registration_number', 'LIKE', '%' . $this->request->get('npc_registration_number') . '%');
        }
    }

    

}
