<?php

namespace App\Repositories\User;

use App\Infrastructure\Filters\BaseFilter;

class UserFilter extends BaseFilter
{
    /**
     * Filter is allowed with following parameters.
     *
     * @var array
     */
    protected $filters = ['name', 'type', 'status', 'email'];


    /**
     * keyword
     *
     * @return void
     */
    public function name()
    {
        if ($this->request->has('name')) {
            $this->builder->where('username', 'LIKE', '%' . $this->request->get('name') . '%');
        }
        // dd('here');
    }

    public function email()
    {
        if ($this->request->has('email')) {
            $this->builder->where('email',  'LIKE', '%' . $this->request->get('email') . '%');
        }
        // dd('here');
    }

    public function type()
    {
        if ($this->request->has('type')) {
            $this->builder->where('type', $this->request->get('type'));
        }
    }

    public function status()
    {
        if ($this->request->has('status')) {
            $this->builder->where('status', $this->request->get('status'));
        }
    }
}
