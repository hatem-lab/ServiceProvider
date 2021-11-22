<?php

/**
 * @license Apache 2.0
 */

namespace api\models\auth;

use api\models\card\MyCard;
use api\models\course\ProfessionModel;
use api\models\lists\ChamberApiModel;
use api\models\lists\ProfessionApiModel;
use api\models\location\AreaApiModel;
use api\models\location\Location;
use api\models\other\Area;
use api\models\other\Category;
use api\models\other\IdValueApiModel;
use api\models\other\Region;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Class SummeryBusinessProductsCountApiModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="SummeryBusinessProductsCountApiModel model",
 *     description="SummeryBusinessProductsCountApiModel model",
 * )
 */
class SummeryBusinessProductsCountApiModel extends Model
{
    /**
     * @OA\Property(
     *     description="id",
     *     title="id",
     * )
     *
     * @var integer
     */
    public $id;

    /**
     * @OA\Property(
     *     description="name",
     *     title="name",
     * )
     *
     * @var integer
     */
    public $name;

    /**
     * @OA\Property(
     *     description="products_count",
     *     title="products_count",
     * )
     *
     * @var integer
     */
    public $products_count;





}

