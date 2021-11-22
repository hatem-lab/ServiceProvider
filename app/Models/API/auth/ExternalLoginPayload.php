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
 * Class ExternalLoginPayload
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ExternalLoginPayload model",
 *     description="ExternalLoginPayload model",
 * )
 */
class ExternalLoginPayload extends Model
{
    
    /**
     * @OA\Property(
     *     description="the access token sent from login facebook",
     *     title="token",
     * )
     *
     * @var string
     */
    public $token;


}

