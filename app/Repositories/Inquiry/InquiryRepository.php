<?php

namespace App\Repositories\Inquiry;

use App\Models\Inquiry;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class InquiryRepository extends Repository
{

    /**
     * InquiryRepository constructor.
     * @param Inquiry $Inquiry
     */
    public function __construct(Inquiry $Inquiry)
    {
        parent::__construct($Inquiry);
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
            ->filter(new InquiryFilter($request))
            ->latest()
            ->paginate($limit);
    }

}
