<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\notification;


/**
 * Class BookCourseRequest
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="NotificationSettingsRequest model",
 *     description="NotificationSettingsRequest model",
 * )
 */
class NotificationSettingsRequest
{
    /**
     * @OA\Property(
     *     description="NotificationSettings Result Model",
     *     title="result",
     *     @OA\Items(ref="#/components/schemas/NotificationSettings")
     * )
     *
     * @var array
     */
    public $notificationTypes;
}

