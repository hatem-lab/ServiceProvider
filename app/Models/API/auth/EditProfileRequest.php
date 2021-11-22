<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\auth;


use Carbon\Traits\Date;

/**
 * Class EditProfileRequest
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="EditProfileRequest model",
 *     description="EditProfileRequest model",
 * )
 */
class EditProfileRequest
{
    /**
     * @OA\Property(
     *     description="First Name",
     *     title="first_name",
     * )
     *
     * @var string
     */
    public $first_name;

    /**
 * @OA\Property(
 *     description="Last Name",
 *     title="last_name",
 * )
 *
 * @var string
 */
    public $last_name;

    /**
     * @OA\Property(
     *     description="email",
     *     title="email",
     * )
     *
     * @var string
     */

    public $email;

    /**
     * @OA\Property(
     *     description="phone",
     *     title="phone",
     * )
     *
     * @var string
     */

    public $phone;

    /**
     * @OA\Property(
     *     description="birthday",
     *     title="birthday",
     * )
     *
     * @var string
     */
    public $birthday;






    /**
     * @OA\Property(
     *  description="User image",
     *  property="image",
     *  type="string",
     *  format="binary"
     * )
     *
     */

    public $image;

}
