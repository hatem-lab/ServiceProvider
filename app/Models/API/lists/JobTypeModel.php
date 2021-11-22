<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\lists;


use Illuminate\Database\Eloquent\Model;

/**
 * Class JobTypeModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="CategoryModel model",
 *     description="CategoryModel model",
 * )
 */

class JobTypeModel extends Model
{
    protected $fillable = [
        'id','type' , 'status'
    ];

    /**
     * @OA\Property(
     *     description="id",
     *     title="id",
     * )
     *
     * @var integer
     */
    public $id;


    /**
     * @OA\Property(
     *     description="type",
     *     title="type",
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *     description="status",
     *     title="status",
     * )
     *
     * @var integer
     */
    public $status;


}

