<?php

/**
 * @license Apache 2.0
 */

namespace api\models\auth;

use api\models\other\ApiMessage;
use api\models\other\Category;
use api\models\other\Region;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Class SummeryResult
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="SummeryResult model",
 *     description="SummeryResult model",
 * )
 */
class SummeryResult extends Model
{
    /**
     * @OA\Property(
     *     description="SummeryApiModel Model",
     *     title="result",
     * )
     *
     * @var SummeryApiModel
     */
    public $result;

    /**
     * @OA\Property(
     *     description="Indicates if the response is ok or not",
     *     title="isOk",
     * )
     *
     * @var boolean
     */
    public $isOk;

    /**
     * @OA\Property(
     *     description="Api message",
     *     title="message",
     * )
     *
     * @var ApiMessage
     */
    public $message;
}

