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
 * Class GoogleRequestLogin
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="GoogleRequestLogin model",
 *     description="GoogleRequestLogin model",
 * )
 */
class GoogleRequestLogin extends Model
{
    /**
     * @OA\Property(
     *     description="Facebook auth token",
     *     title="auth_token",
     * )
     *
     * @var string
     */
    public $auth_token;


}

