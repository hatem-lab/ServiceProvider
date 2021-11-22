<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\auth;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RegisterResult
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="RegisterResult model",
 *     description="RegisterResult model",
 * )
 */
class RegisterResult extends Model
{

    protected $fillable = [ 'message'];


    /**
     *
     * @OA\Property(
     *     description="Message",
     *     title="message",
     * )
     *
     * @var string
     */
    public $message;
}

