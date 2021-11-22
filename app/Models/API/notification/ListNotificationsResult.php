<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\notification;


use App\Models\API\other\ApiMessage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ListNotificationsResult
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ListNotificationsResult model",
 *     description="ListNotificationsResult model",
 * )
 */
class ListNotificationsResult extends Model
{
    protected $fillable = [
        'items_count','result' , 'isOk' , 'message'
    ];

     /**
     * @OA\Property(
     *     description="items_count",
     *     title="items_count",
     * )
     *
     * @var integer
     */
    public $items_count;


    /**
     * @OA\Property(
     *     description="ListNotifications Result Model",
     *     title="result",
     *     @OA\Items(ref="#/components/schemas/ListNotifications")
     * )
     *
     * @var array
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
