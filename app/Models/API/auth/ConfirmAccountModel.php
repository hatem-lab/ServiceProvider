<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\auth;

use api\models\other\Category;
use api\models\other\Region;
use Illuminate\Database\Eloquent\Model;
use yii\db\ActiveRecord;

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
class ConfirmAccountModel
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
     *     description="Verification Code",
     *     title="code",
     * )
     *
     * @var string
     */
    public $code;

    /**
     * @OA\Property(
     *     description="password",
     *     title="password",
     * )
     *
     * @var string
     */
    public $password;

}

