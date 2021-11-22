<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\notification;



/**
 * Class NotificationSettings
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="NotificationSettings model",
 *     description="NotificationSettings model",
 * )
 */
class NotificationSettings
{
    /**
     * @OA\Property(
     *     description="Type of the Notitication",
     *     title="type of the notification",
     * )
     *
     * @var integer
     */
    public $type;

    /**
     * @OA\Property(
     *     description="the status of the notitifcation if it's active or not.",
     *     title="active or not",
     * )
     *
     * @var bool
     */
    public $active;
}

