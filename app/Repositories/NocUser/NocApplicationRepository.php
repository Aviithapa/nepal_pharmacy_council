<?php

namespace App\Repositories\NocUser;

use App\Models\NocApplication;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class NocApplicationRepository extends Repository
{

    /**
     * NocUserRepository constructor.
     * @param NocUser $NocUser
     */
    public function __construct(NocApplication $NocUser)
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
        return $this->model->newQuery()->where('good_standing', false)->latest()
        ->filter(new NocFilter($request))
        ->paginate($limit);
    }

    public function getStatusCounts($statuses, $status = false)
    {
        return $this->model
            ->select('status', DB::raw('count(*) as count'))
            ->whereIn('status', $statuses)
            ->groupBy('status')
            ->where('good_standing', $status)
            ->get()
            ->keyBy('status')
            ->toArray();
    }

    public function getNextRef()
    {
        return DB::table('noc_applicants')->max('ref') + 1;
    }

    /**
     * @param Request $request
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getPaginatedListGoodStanding(Request $request, $type, array $columns = array('*'))
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()->where('good_standing', true)->latest()
        ->filter(new NocFilter($request))
        ->paginate($limit);
    }
}
