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
 * Class PasswordPayload
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="PasswordPayload model",
 *     description="PasswordPayload model",
 * )
 */
class PasswordPayload extends Model
{
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

