<?php


namespace App\Models\API\notification;



/**
 * Class NotificationData
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="NotificationData model",
 *     description="NotificationData model",
 * )
 */
class NotificationData
{
    /**
     * @OA\Property(
     *     description="Notification URL",
     *     title="URL",
     * )
     *
     * @var string
     */
    public $url;

    /**
     * @OA\Property(
     *     description="Notification Icon",
     *     title="icon",
     * )
     *
     * @var string
     */
    public $icon;

    /**
     * @OA\Property(
     *     description="the state of the notification read or not",
     *     title="state",
     * )
     *
     * @var boolean
     */
    public $is_read;

    /**
     * @OA\Property(
     *     description="Date",
     *     title="date",
     * )
     *
     * @var string
     */
    public $date;
}
