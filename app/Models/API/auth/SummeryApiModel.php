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
 * Class SummeryApiModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="SummeryApiModel model",
 *     description="SummeryApiModel model",
 * )
 */
class SummeryApiModel extends Model
{
    /**
     * @OA\Property(
     *     description="products_count",
     *     title="products_count",
     * )
     *
     * @var integer
     */
    public $products_count;

    /**
     * @OA\Property(
     *     description="businesses_count",
     *     title="businesses_count",
     * )
     *
     * @var integer
     */
    public $businesses_count;

    /**
     * @OA\Property(
     *     description="categories_count",
     *     title="categories_count",
     * )
     *
     * @var integer
     */
    public $categories_count;

    /**
     * @OA\Property(
     *     description="SummeryBusinessProductsCountApiModel Result Model",
     *     title="business_to_products",
     *     @OA\Items(ref="#/components/schemas/SummeryBusinessProductsCountApiModel")
     * )
     *
     * @var array
     */
    public $business_to_products;

    /**
     * @OA\Property(
     *     description="other_products_count",
     *     title="other_products_count",
     * )
     *
     * @var integer
     */
    public $other_products_count;



}

