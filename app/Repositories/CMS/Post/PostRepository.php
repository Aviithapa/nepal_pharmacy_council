<?php

namespace App\Repositories\CMS\Post;

use App\Models\Post;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository extends Repository
{

    /**
     * MenuRepository constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        parent::__construct($post);
    }

    /**
     * @param Request $request
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getPaginatedList(Request $request, $type, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->where('type', $type)
            ->filter(new PostFilter($request))
            ->latest()
            ->paginate($limit);
    }
}
