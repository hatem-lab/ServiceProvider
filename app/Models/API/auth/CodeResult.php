<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\auth;


use Illuminate\Database\Eloquent\Model;

/**
 * Class CodeResult
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="CodeResult model",
 *     description="CodeResult model",
 * )
 */
class CodeResult
{

    /**
     * @OA\Property(
     *     description="code",
     *     title="code",
     * )
     *
     * @var integer
     */
    public $code;



}

