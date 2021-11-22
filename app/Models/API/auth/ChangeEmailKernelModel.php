<?php

/**
 * @license Apache 2.0
 */

namespace api\models\auth;

use api\models\other\Category;
use api\models\other\Region;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Class ChangeEmailKernelModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ChangeEmailKernelModel model",
 *     description="ChangeEmailKernelModel model",
 * )
 */
class ChangeEmailKernelModel extends Model
{
    /**
     * @OA\Property(
     *     description="User new email",
     *     title="newEmail",
     * )
     *
     * @var string
     */
    public $newEmail;

    /**
     * @OA\Property(
     *     description="User password",
     *     title="password",
     * )
     *
     * @var string
     */
    public $password;
}

