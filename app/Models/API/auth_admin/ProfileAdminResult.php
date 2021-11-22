<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\auth_admin;

use App\Models\API\location\CityApiModel;
use App\Models\API\location\CityDetailsApiModel;
use App\Models\API\location\CountryDetailsApiModel;
use App\Models\API\location\Location;
use App\Models\API\location\LocationAdmin;
use App\Models\API\location\LocationApiModel;
use App\Models\API\location\RegionApiModel;
use App\Models\API\other\CarImage;
use App\Models\API\other\IdValueApiModel;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProfileResult
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ProfileResult model",
 *     description="ProfileResult model",
 * )
 */
class ProfileAdminResult extends Model
{

    protected $fillable = [
        'id' , 'first_name' , 'last_name' ,
        'phone' , 'image' ,'city','region','birthday','email',
        'location' , 'isOnline','preferred_media_contact'

    ];

    /**
     * @OA\Property(
     *     description="ID",
     *     title="id",
     * )
     *
     * @var integer
     */
    public $id;


    /**
     * @OA\Property(
     *     description="First Name",
     *     title="first_name",
     * )
     *
     * @var string
     */
    public $first_name;

    /**
     * @OA\Property(
     *     description="Last Name",
     *     title="last_name",
     * )
     *
     * @var string
     */
    public $last_name;
    /**
     * @OA\Property(
     *     description="birthday ",
     *     title="birthday",
     * )
     *
     * @var string
     */
    public $birthday;
    /**
     * @OA\Property(
     *     description=" email",
     *     title="email",
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *     description="Phone",
     *     title="phone",
     * )
     *
     * @var string
     */
    public $phone;


    /**
     * @OA\Property(
     *     description="Image Url",
     *     title="image",
     * )
     *
     * @var string
     */
    public $image;

    /**
     * @OA\Property(
     *     description="city",
     *     title="city",
     * )
     *
     * @var CityApiModel
     */
    public $city;


    /**
     * @OA\Property(
     *     description=" region",
     *     title="region",

     * )
     *
     * @var RegionApiModel
     */

    public $region;

    /**
     * @OA\Property(
     *     description="location",
     *     title="location",
     * )
     *
     * @var string
     */
    public $location;


    /**
     * @OA\Property(
     *     description="Is Online",
     *     title="is_online",
     * )
     *
     * @var integer
     */

    public $isOnline;





}

