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
 * Class ConfirmationCodeModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ConfirmationCodeModel model",
 *     description="ConfirmationCodeModel model",
 * )
 */
class ConfirmationCodeModel extends Model
{
    /**
     * @OA\Property(
     *     description="The username or phone of user to verify",
     *     title="username",
     * )
     *
     * @var string
     */
    public $username;

    /**
     * @OA\Property(
     *     description="Confirmation Code",
     *     title="code",
     * )
     *
     * @var string
     */
    public $code;

}

