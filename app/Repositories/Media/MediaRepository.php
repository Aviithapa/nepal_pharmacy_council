<?php


namespace App\Repositories\Media;


use App\Models\Medias;
use App\Repositories\Repository;

class MediaRepository extends Repository
{

    public function __construct(Medias $model)
    {
        parent::__construct($model);
    }
}
