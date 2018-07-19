<?php
/**
 * User: haydenzhou
 * Date: 2018/7/10
 * Time: 上午10:18
 */

namespace Wh2Work\LaravelApi\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Wh2Work\LaravelFrame\Responses\ApiResponseTraits;

abstract class BaseRepository
{
    use ApiResponseTraits;


    protected $model;
    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}