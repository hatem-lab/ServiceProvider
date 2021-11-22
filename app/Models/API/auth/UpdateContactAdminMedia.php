<?php

/**
 * @license Apache 2.0
 */

namespace api\models\auth;

use api\models\card\MyCard;
use api\models\course\ProfessionModel;
use api\models\lists\ProfessionApiModel;
use api\models\location\Location;
use api\models\other\Area;
use api\models\other\Category;
use api\models\other\Region;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Array_;
use yii\db\ActiveRecord;

/**
 * Class PhoneModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="PhoneModel model",
 *     description="PhoneModel model",
 * )
 */
class UpdateContactAdminMedia extends Model
{
    /**
     * @OA\Property(
     *     description="countryCode",
     *     title="countryCode",
     * )
     *
     * @var array(integer)
     */
    public $contact_media_ids;

}

