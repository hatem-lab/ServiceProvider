<?php

/**
 * @license Apache 2.0
 */

namespace api\models\auth_admin;


use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Class LoginAdminPayload
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="LoginAdminPayload model",
 *     description="LoginAdminPayload model",
 * )
 */
class LoginAdminPayload extends Model
{
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
     *     description="Account Password",
     *     title="password",
     * )
     *
     * @var string
     */
    public $password;

}

