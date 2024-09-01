<?php

namespace App\Repositories\Contact;

use App\Models\Contact;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactRepository extends Repository
{

    /**
     * ContactRepository constructor.
     * @param Contact $Contact
     */
    public function __construct(Contact $Contact)
    {
        parent::__construct($Contact);
    }

    /**
     * @param Request $request
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getPaginatedList(Request $request, $type = null, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->latest()
            ->paginate($limit);
    }

    /**
     * @param String $name
     * @return 
     */
    public function findByName($name)
    {
        return $this->model->where('name', $name)->first();
    }
}
