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
 * Class SetProfileDataRequest
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="SetProfileDataRequest model",
 *     description="SetProfileDataRequest model",
 * )
 */
class SetProfileDataRequest extends Model
{
    /**
     * @OA\Property(
     *     description="User phone",
     *     title="phone",
     * )
     *
     * @var string
     */
    public $phone;

    /**
     * @OA\Property(
     *     description="User new password",
     *     title="new_password",
     * )
     *
     * @var string
     */
    public $new_password;

}

