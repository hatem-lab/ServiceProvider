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
 * Class ResetPasswordApiModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ResetPasswordApiModel model",
 *     description="ResetPasswordApiModel model",
 * )
 */
class ResetPasswordApiModel extends Model
{
    /**
     * @OA\Property(
     *     description="Confirmation Code",
     *     title="code",
     * )
     *
     * @var string
     */
    public $code;

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
     *     description="New Password",
     *     title="password",
     * )
     *
     * @var string
     */
    public $password;


}

