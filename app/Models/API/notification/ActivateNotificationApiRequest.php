<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\notification;


use Illuminate\Database\Eloquent\Model;

/**
 * Class RequestPayLoad
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ActivateNotificationApiRequest model",
 *     description="ActivateNotificationApiRequest model",
 * )
 */
class ActivateNotificationApiRequest extends Model
{

    protected $fillable = [
        'enable_disable_notification'
    ];





    /**
     * @OA\Property(
     *     description="Type of activate_notification, 1 => enable, 2 => disable",
     *     enum={"1", "2"},
     *     title="enable_disable_notification",
     * )
     *
     * @var string
     */
    public $enable_disable_notification;





}

