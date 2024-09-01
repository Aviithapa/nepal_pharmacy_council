<?php

namespace App\Repositories\NewsLetterSubscribe;

use App\Models\NewsletterSubscriber;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsLetterSubscribeRepository extends Repository
{

    /**
     * NewsLetterSubscribeRepository constructor.
     * @param NewsLetterSubscribe $NewsLetterSubscribe
     */
    public function __construct(NewsletterSubscriber $newsLetterSubscribe)
    {
        parent::__construct($newsLetterSubscribe);
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
