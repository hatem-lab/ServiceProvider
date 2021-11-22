<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\auth;
use Illuminate\Database\Eloquent\Model;


/**
 * Class RegisterModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="RegisterModel model",
 *     description="RegisterModel model",
 * )
 */
class RegisterModel extends Model
{


    /**
     * @OA\Property(
     *     description="fullname",
     *     title="fullname",
     * )
     *
     * @var string
     */
    public $fullname;

    /**
     * @OA\Property(
     *     description="Phone",
     *     title="phone",
     * )
     *
     * @var string
     */
    public $phone;

    /**
     * @OA\Property(
     *     description="User  password",
     *     title="password",
     * )
     *
     * @var string
     */
    public $password;


    /**
     * @OA\Property(
     *     description="User  password",
     *     title="confirm_password",
     * )
     *
     * @var string
     */
    public $ConfirmPassword;

    }

