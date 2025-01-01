<?php

namespace App\Repositories\NocUser;

use App\Models\NocUsers;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class NocUserRepository extends Repository
{

    /**
     * NocUserRepository constructor.
     * @param NocUser $NocUser
     */
    public function __construct(NocUsers $NocUser)
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
        return $this->model->newQuery()
            ->latest()
            ->paginate($limit);
    }
}
