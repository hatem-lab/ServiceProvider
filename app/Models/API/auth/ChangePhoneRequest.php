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
 * Class ChangePhoneRequest
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ChangePhoneRequest model",
 *     description="ChangePhoneRequest model",
 * )
 */
class ChangePhoneRequest extends Model
{
    /**
     * @OA\Property(
     *     description="User password",
     *     title="password",
     * )
     *
     * @var string
     */
    public $password;

    /**
     * @OA\Property(
     *     description="User new phone",
     *     title="new_phone",
     * )
     *
     * @var integer
     */
    public $new_phone;

}

