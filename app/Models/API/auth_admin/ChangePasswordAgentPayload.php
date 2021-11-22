<?php

/**
 * @license Apache 2.0
 */

namespace api\models\auth_admin;

use Illuminate\Database\Eloquent\Model;


/**
 * Class ChangePasswordPayload
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ChangePasswordPayload model",
 *     description="ChangePasswordPayload model",
 * )
 */
class ChangePasswordAgentPayload extends Model
{
    /**
     * @OA\Property(
     *     description="User old password",
     *     title="oldPassword",
     * )
     *
     * @var string
     */
    public $oldPassword;

    /**
     * @OA\Property(
     *     description="User new password",
     *     title="newPassword",
     * )
     *
     * @var string
     */
    public $newPassword;
    
}

