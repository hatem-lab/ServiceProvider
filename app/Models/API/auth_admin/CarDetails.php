<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\auth_admin;


use App\Models\API\other\IdValueApiModel;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CarDetails
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="CarDetails model",
 *     description="CarDetails model",
 * )
 */

class CarDetails extends Model
{

    protected $fillable = ['carImages' , 'carType'];


    /**
     * @OA\Property(
     *     description="Car Images",
     *     title="car_images",
     *     @OA\Items(ref="#/components/schemas/CarImage")
     * )
     *
     * @var array
     */

    public $carImages;

    /**
     * @OA\Property(
     *     description="Car Type",
     *     title="car_type",
     * )
     *
     * @var IdValueApiModel
     */

    public $carType;


}

