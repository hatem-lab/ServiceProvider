<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\auth;


use App\Models\API\other\ApiMessage;
use Illuminate\Database\Eloquent\Model;


/**
 * Class ApiResultProfileResult
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ApiResultProfileResult model",
 *     description="ApiResultProfileResult model",
 * )
 */
class ApiResultProfileResult extends Model
{
    protected $fillable = [
        'result' , 'isOk' , 'message'
    ];

    /**
     * @OA\Property(
     *     description="Result Model",
     *     title="result",
     * )
     *
     * @var ProfileResult
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

