<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\auth;

use api\models\other\Category;
use api\models\other\Region;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Class ChangePhoneNumberKernelModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ChangePhoneNumberKernelModel model",
 *     description="ChangePhoneNumberKernelModel model",
 * )
 */
class ChangePhoneNumberKernelModel
{
    /**
     * @OA\Property(
     *     description="User new phone number",
     *     title="newPhoneNumber",
     * )
     *
     * @var string
     */
    public $newPhoneNumber;

}

