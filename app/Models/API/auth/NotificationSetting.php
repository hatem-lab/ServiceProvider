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
 * Class NotificationSetting
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="NotificationSetting model",
 *     description="NotificationSetting model",
 * )
 */
class NotificationSetting extends Model
{
    /**
     * @OA\Property(
     *     title="allowMessagesNotifications",
     * )
     *
     * @var boolean
     */
    public $allowMessagesNotifications;

    /**
     * @OA\Property(
     *     title="ticketAnsweredNotification",
     * )
     *
     * @var boolean
     */
    public $ticketAnsweredNotification;

    /**
     * @OA\Property(
     *     title="newReviewOnMyProduct",
     * )
     *
     * @var boolean
     */
    public $newReviewOnMyProduct;

    /**
     * @OA\Property(
     *     title="newViewToMyProduct",
     * )
     *
     * @var boolean
     */
    public $newViewToMyProduct;

    /**
     * @OA\Property(
     *     title="yourProductSavedBySomeone",
     * )
     *
     * @var boolean
     */
    public $yourProductSavedBySomeone;

}

