<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\auth_admin;


use Illuminate\Database\Eloquent\Model;

/**
 * Class CarImage
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="CarImage model",
 *     description="CarImage model",
 * )
 */

class CarImage extends Model
{

    protected $fillable = ['image' , 'id'];

    /**
     * @OA\Property(
     *     description="ID",
     *     title="id",
     * )
     *
     * @var integer
     */
    public $id;

    /**
     * @OA\Property(
     *     description="Message type",
     *     title="type",
     * )
     *
     * @var string
     */
    public $image;


}

