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
 * Class ProfileSummaryApiModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ProfileSummaryApiModel model",
 *     description="ProfileSummaryApiModel model",
 * )
 */
class ProfileSummaryApiModel extends Model
{
    /**
     * @OA\Property(
     *     description="Subscribed Subjects count",
     *     title="subscribedSubjectsCount",
     * )
     *
     * @var integer
     */
    public $subscribedSubjectsCount;

    /**
     * @OA\Property(
     *     description="Subscribed Paths count",
     *     title="subscribedPathsCount",
     * )
     *
     * @var integer
     */
    public $subscribedPathsCount;

    /**
     * @OA\Property(
     *     description="Done Subjects count",
     *     title="doneSubjectsCount",
     * )
     *
     * @var integer
     */
    public $doneSubjectsCount;

    /**
     * @OA\Property(
     *     description="Done Paths count",
     *     title="donePathsCount",
     * )
     *
     * @var integer
     */
    public $donePathsCount;

    /**
     * @OA\Property(
     *     description="Done Subjects precentage to the ones in favorit",
     *     title="doneSubjectsPrecentageToFav",
     * )
     *
     * @var float
     */
    public $doneSubjectsPrecentageToFav;

    /**
     * @OA\Property(
     *     description="Done Paths precentage to the ones in favorit",
     *     title="donePathsPrecentageToFav",
     * )
     *
     * @var float
     */
    public $donePathsPrecentageToFav;

    /**
     * @OA\Property(
     *     description="Done subjects to subscribed ones precentage",
     *     title="doneSubjectsSubscribed",
     * )
     *
     * @var float
     */
    public $doneSubjectsSubscribed;

    /**
     * @OA\Property(
     *     description="Done subjects to subscribed ones precentage",
     *     title="doneSubjectsPrecentageToSubscribed",
     * )
     *
     * @var float
     */
    public $doneSubjectsPrecentageToSubscribed;

    /**
     * @OA\Property(
     *     description="Done paths to subscribed ones precentage",
     *     title="donePathsPrecentageToSubscribed",
     * )
     *
     * @var float
     */
    public $donePathsPrecentageToSubscribed;

}

