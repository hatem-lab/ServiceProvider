<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\auth_admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ConfirmAccountModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ConfirmAccountModel model",
 *     description="ConfirmAccountModel model",
 * )
 */
class ForgetPasswordConfirm
{

    /**
     * @OA\Property(
     *     description="The phone of user to verify",
     *     title="phone",
     * )
     *
     * @var string
     */
    public $phone;
    /**
     * @OA\Property(
     *     description="The code of agent to verify",
     *     title="code",
     * )
     *
     * @var string
     */
    public $code;

    /**
     * @OA\Property(
     *     description="newPassword",
     *     title="newPassword",
     * )
     *
     * @var string
     */
    public $newPassword;


}

