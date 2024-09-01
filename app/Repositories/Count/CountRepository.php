<?php

namespace App\Repositories\Count;

use App\Models\Count;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CountRepository extends Repository
{

    /**
     * CountRepository constructor.
     * @param Count $Count
     */
    public function __construct(Count $Count)
    {
        parent::__construct($Count);
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
        $data = $this->model->where('name', $name)->first();
        return $data;
    }
}
