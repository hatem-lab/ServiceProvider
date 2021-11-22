<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\lists;

use App\Models\API\other\ApiMessage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SectionResult
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="SectionResult model",
 *     description="SectionResult model",
 * )
 */
class SectionResult extends Model
{
    protected $fillable = [
        'result' , 'isOk' , 'message','items_count'
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
     *     description="RangesPriceModel Result Model",
     *     title="result",
     *     @OA\Items(ref="#/components/schemas/SectionModel")
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

