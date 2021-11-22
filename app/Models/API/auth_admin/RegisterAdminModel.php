<?php

/**
 * @license Apache 2.0
 */

namespace api\models\auth_admin;


/**
 * Class RegisterAdminModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="RegisterAdminModel model",
 *     description="RegisterAdminModel model",
 * )
 */
class RegisterAdminModel
{

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
     *     description="job_type_id",
     *     title="job_type_id",
     * )
     *
     * @var integer
     */
    public $job_type_id;

    /**
     * @OA\Property(
     *     description="Phone",
     *     title="phone",
     * )
     *
     * @var string
     */
    public $phone;

    /**
     * @OA\Property(
     *     description="Account Password",
     *     title="password",
     * )
     *
     * @var string
     */
    public $password;

    /**
     * @OA\Property(
     *     description="country_id",
     *     title="country_id",
     * )
     *
     * @var integer
     */
    public $country_id;

    /**
     * @OA\Property(
     *     description="city_id",
     *     title="city_id",
     * )
     *
     * @var integer
     */
    public $city_id;

    /**
     * @OA\Property(
     *     description="address",
     *     title="address",
     * )
     *
     * @var string
     */
    public $address;

    /**
     * @OA\Property(
     *     description="linephone",
     *     title="linephone",
     * )
     *
     * @var string
     */
    public $linephone;
    /**
     * @OA\Property(
     *     description="description",
     *     title="description",
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     description="contact_media_ids",
     *     title="contact_media_ids",
     * @OA\Items(type="integer")
     * )
     *
     * @var array
     */
    public $contact_media_ids;

    /**
     * @OA\Property(
     *     description="sections_ids",
     *     title="sections_ids",
     * @OA\Items(type="integer")
     * )
     *
     * @var array
     */
    public $sections_ids;

    /**
     *  @OA\Property(
     * description="Item image_license",
     *  property="image_license[]",
     * type="array",
     *   @OA\Items(type="string", format="binary")
     *  )
     *
     */

    public $image_license;

    /**
     *  @OA\Property(
     * description="Item image_commercial",
     *  property="image_commercial[]",
     * type="array",
     *   @OA\Items(type="string", format="binary")
     *  )
     *
     */

    public $image_commercial;



}

