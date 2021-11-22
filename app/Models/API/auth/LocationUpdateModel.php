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
 *     title="Location Update Model",
 *     description="Location Update Model",
 * )
 */
class LocationUpdateModel
{

    /**
     * @OA\Property(
     *     description="Location Id",
     *     title="location_id",
     * )
     *
     * @var integer
     */
    public $location_id;

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

    /**
     * @OA\Property(
     *     description="Status: 0 => InActive , 1 => Active",
     *     enum={"0", "1"},
     *     title="status",
     * )
     *
     * @var integer
     */

    public $status;

}

