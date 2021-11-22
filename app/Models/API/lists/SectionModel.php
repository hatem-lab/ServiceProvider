<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\lists;


use Illuminate\Database\Eloquent\Model;

/**
 * Class SectionModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="SectionModel model",
 *     description="SectionModel model",
 * )
 */

class SectionModel extends Model
{
    protected $fillable = [
        'id','name' , 'status'
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
     *     description="name",
     *     title="name",
     * )
     *
     * @var string
     */
    public $name;

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

