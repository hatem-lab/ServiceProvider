<?php

/**
 * @license Apache 2.0
 */

namespace api\models\auth;

use api\models\card\MyCard;
use api\models\course\ProfessionModel;
use api\models\lists\ProfessionApiModel;
use api\models\location\Location;
use api\models\other\Area;
use api\models\other\Category;
use api\models\other\Region;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Class PhoneModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="PhoneModel model",
 *     description="PhoneModel model",
 * )
 */
class PhoneModel extends Model
{
    /**
     * @OA\Property(
     *     description="countryCode",
     *     title="countryCode",
     * )
     *
     * @var string
     */
    public $countryCode;

    /**
     * @OA\Property(
     *     description="countryCodeSource",
     *     title="countryCodeSource",
     * )
     *
     * @var string
     */
    public $countryCodeSource;

    /**
     * @OA\Property(
     *     description="nationalNumber",
     *     title="nationalNumber",
     * )
     *
     * @var string
     */
    public $nationalNumber;

    /**
     * @OA\Property(
     *     description="formatedValue",
     *     title="formatedValue",
     * )
     *
     * @var string
     */
    public $formatedValue;
}

