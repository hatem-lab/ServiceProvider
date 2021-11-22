<?php


namespace App\Models\API\auth;


use Illuminate\Database\Eloquent\Model;
/**
 * Class ChangePasswordRequestConfirmed
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ChangePasswordRequestConfirmed model",
 *     description="ChangePasswordRequestConfirmed model",
 * )
 */
class ChangePasswordRequestConfirmed extends Model
{
    /**
     * @OA\Property(
     *     description="User old password",
     *     title="code",
     * )
     *
     * @var string
     */
    public $code;

    /**
     * @OA\Property(
     *     description="User new password",
     *     title="newPassword",
     * )
     *
     * @var string
     */
    public $newPassword;
    /**
     * @OA\Property(
     *     description="User new password",
     *     title="new_confirm_password",
     * )
     *
     * @var string
     */
    public $newConfirmPassword;
}
