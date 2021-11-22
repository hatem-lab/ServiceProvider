<?php

/**
 * @license Apache 2.0
 */

namespace api\models\auth;


use api\models\other\Category;
use api\models\other\Region;
use Illuminate\Database\Eloquent\Model;


/**
 * Class ForgotPasswordApiModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ForgotPasswordApiModel model",
 *     description="ForgotPasswordApiModel model",
 * )
 */
class ForgotPasswordApiModel extends Model
{

    /**
     * @OA\Property(
     *     description="phone",
     *     title="phone",
     * )
     *
     * @var string
     */
    public $phone;




}

