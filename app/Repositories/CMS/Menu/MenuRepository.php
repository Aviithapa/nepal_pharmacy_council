<?php

namespace App\Repositories\CMS\Menu;

use App\Models\Menu;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class MenuRepository extends Repository
{

    /**
     * MenuRepository constructor.
     * @param Menu $menu
     */
    public function __construct(Menu $menu)
    {
        parent::__construct($menu);
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
}
