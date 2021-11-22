<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\auth;

use App\Models\API\other\ApiMessage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JobTypeResult
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="MediaModel model",
 *     description="MediaModel model",
 * )
 */
class MediaResult extends Model
{
    protected $fillable = [
        'result' , 'isOk' , 'message'
    ];

    /**
     * @OA\Property(
     *     description="MediaModel Result Model",
     *     title="result",
     *     @OA\Items(ref="#/components/schemas/MediaModel")
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

