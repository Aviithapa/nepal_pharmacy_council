<?php

namespace App\Repositories\College;

use App\Models\College;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CollegeRepository extends Repository
{

    /**
     * CollegeRepository constructor.
     * @param College $College
     */
    public function __construct(College $college)
    {
        parent::__construct($college);
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
            ->filter(new CollegeFilter($request))
            ->latest()
            ->paginate($limit);
    }

}
