<?php

namespace App\Repositories\MPharma;

use App\Models\MPharmaDetail;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class MPharmaRepository extends Repository
{

    /**
     * NocUserRepository constructor.
     * @param NocUser $NocUser
     */
    public function __construct(MPharmaDetail $NocUser)
    {
        parent::__construct($NocUser);
    }

    /**
     * @param Request $request
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getPaginatedList(Request $request, $type, array $columns = array('*'))
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()->latest()
        ->filter(new MPharmaFilter($request))
        ->paginate($limit);
    }

    

    public function getNextRef()
    {
        return DB::table('noc_applicants')->max('ref') + 1;
    }

    
}
