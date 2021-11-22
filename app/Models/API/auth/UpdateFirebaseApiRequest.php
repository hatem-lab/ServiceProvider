<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\auth;


/**
 * Class UpdateFirebaseApiRequest
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="UpdateFirebaseApiRequest model",
 *     description="UpdateFirebaseApiRequest model",
 * )
 */
class UpdateFirebaseApiRequest
{
    /**
     * @OA\Property(
     *     description="New Token",
     *     title="newToken",
     * )
     *
     * @var string
     */
    public $newToken;

}

