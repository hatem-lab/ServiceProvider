<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\notification;


use Illuminate\Database\Eloquent\Model;

/**
 * Class ListNotifications
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ListNotifications model",
 *     description="ListNotifications model",
 * )
 */
class ListNotifications extends Model
{
    protected $fillable = [
        'id' , 'image' , 'title' ,
        'body' , 'data' , 'is_read' ,
        'date' , 'type'
    ];

    /**
     * @OA\Property(
     *     description="notification Id",
     *     title="id",
     * )
     *
     * @var string
     */
    public $id;

    /**
     * @OA\Property(
     *     description="Notification user image",
     *     title="image",
     * )
     *
     * @var string
     */
    public $image;

    /**
     * @OA\Property(
     *     description="Notification title",
     *     title="title",
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *     description="Notification body",
     *     title="body",
     * )
     *
     * @var string
     */
    public $body;

    /**
     * @OA\Property(
     *     description="Data depends on the notification type",
     *     title="data",
     * )
     *
     * @var object
     */
    public $data;

    /**
     * @OA\Property(
     *     description="Data depends on the notification type",
     *     title="data",
     * )
     *
     * @var bool
     */
    public $is_read;

    /**
     * @OA\Property(
     *     description="Data depends on the notification type",
     *     title="data",
     * )
     *
     * @var string
     */
    public $date;

    /**
     * @OA\Property(
     *     description="type of notification",
     *     title="type",
     * )
     *
     * @var int
     */
    public $type;

}

