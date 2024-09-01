<?php

namespace App\Repositories\News;

use App\Models\News;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsRepository extends Repository
{

    /**
     * NewsRepository constructor.
     * @param News $News
     */
    public function __construct(News $news)
    {
        parent::__construct($news);
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
            ->filter(new NewsFilter($request))
            ->latest()
            ->paginate($limit);
    }

}
