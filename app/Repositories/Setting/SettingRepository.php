<?php

namespace App\Repositories\Setting;

use App\Models\Setting;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SettingRepository extends Repository
{

    /**
     * SettingRepository constructor.
     * @param Setting $Setting
     */
    public function __construct(Setting $setting)
    {
        parent::__construct($setting);
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
