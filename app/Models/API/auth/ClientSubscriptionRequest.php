<?php

/**
 * @license Apache 2.0
 */

namespace api\models\auth;

use api\models\other\Category;
use api\models\other\Region;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Class ClientSubscriptionRequest
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ClientSubscriptionRequest model",
 *     description="ClientSubscriptionRequest model",
 * )
 */
class ClientSubscriptionRequest extends Model
{
    /**
     * @OA\Property(
     *     description="Subscriping client name",
     *     title="username",
     * )
     *
     * @var string
     */
    public $username;

    /**
     * @OA\Property(
     *     description="Work/job name",
     *     title="work_name",
     * )
     *
     * @var string
     */
    public $work_name;

    /**
     * @OA\Property(
     *     description="Phone number",
     *     title="phone",
     * )
     *
     * @var string
     */
    public $phone;

    /**
     * @OA\Property(
     *     description="Mobile number",
     *     title="mobile",
     * )
     *
     * @var string
     */
    public $mobile;

    /**
     * @OA\Property(
     *     description="City name",
     *     title="city",
     * )
     *
     * @var string
     */
    public $city;

    /**
     * @OA\Property(
     *     description="Area name",
     *     title="area",
     * )
     *
     * @var string
     */
    public $area;

    /**
     * @OA\Property(
     *     description="Address",
     *     title="address",
     * )
     *
     * @var string
     */
    public $address;

}

