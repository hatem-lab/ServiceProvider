<?php

/**
 * @license Apache 2.0
 */

namespace api\models\auth;

use api\models\card\MyCard;
use api\models\course\ProfessionModel;
use api\models\lists\ProfessionApiModel;
use api\models\location\Location;
use api\models\other\ApiMessage;
use api\models\other\Area;
use api\models\other\Category;
use api\models\other\Region;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Class ProfileSummeryResult
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ProfileSummeryResult model",
 *     description="ProfileSummeryResult model",
 * )
 */
class ProfileSummeryResult extends Model
{
    /**
     * @OA\Property(
     *     description="Result Model",
     *     title="result",
     * )
     *
     * @var ProfileSummaryApiModel
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

