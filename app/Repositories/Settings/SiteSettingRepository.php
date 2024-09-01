<?php

namespace App\Repositories\Settings;

use App\Models\SiteSetting;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SiteSettingRepository extends Repository
{

    /**
     * SiteSettingRepository constructor.
     * @param SiteSetting $siteSetting
     */
    public function __construct(SiteSetting $siteSetting)
    {
        parent::__construct($siteSetting);
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
