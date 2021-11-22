<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\location;


/**
 * Class Location
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="Location model",
 *     description="Location model",
 * )
 */
class LocationModel
{

    /**
     * @OA\Property(
     *     description="Address",
     *     title="address",
     * )
     *
     * @var String
     */
    public $address;

    /**
     * @OA\Property(
     *     description="Region",
     *     title="region",
     * )
     *
     * @var integer
     */
    public $region_id;

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

