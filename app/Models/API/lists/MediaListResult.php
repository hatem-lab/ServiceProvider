<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\lists;

use App\Models\API\other\ApiMessage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderStatusListResult
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="MediaListResult model",
 *     description="MediaListResult model",
 * )
 */
class MediaListResult extends Model
{
    protected $fillable = [
        'media_contact' ,
    ];

    /**
     * @OA\Property(
     *     description="OrderStatusListModel Result Model",
     *     title="result",
     *     @OA\Items(ref="#/components/schemas/MediaModel")
     * )
     *
     * @var array
     */
    public $media_contact;




}

