<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\location;


use App\Models\API\lists\RegionApiModel;
use App\Models\API\other\IdValueApiModel;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Location
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="LocationAdmin model",
 *     description="LocationAdmin model",
 * )
 */
class LocationAdmin extends Model
{
    protected $fillable = [
        'region' , 'lat' ,
        'lng'
    ];

    /**
     * @OA\Property(
     *     description="Address",
     *     title="address",
     * )
     *
     * @var RegionApiModel
     */
    public $region;



    /**
     * @OA\Property(
     *     description="Lat",
     *     title="lat",
     * )
     *
     * @var Double
     */
    public $lat;


    /**
     * @OA\Property(
     *     description="Lng",
     *     title="lng",
     * )
     *
     * @var Double
     */
    public $lng;

}

