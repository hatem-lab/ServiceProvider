<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\auth;



use App\Models\API\lists\MediaModel;
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
class ProfileResult extends Model
{
    protected $fillable = [
        'id' , 'first_name' , 'last_name' ,'email','location','region',
        'phone' , 'image','birthday','preferred_media_contact'

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
     *     description=" birthday",
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
     *     description="Last Name",
     *     title="last_name",
     * )
     *
     * @var string
     */
    public $last_name;

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
     *     description="region",
     *     title="region",
     * )
     *
     * @var string
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
     *     description="Image Url",
     *     title="image",
     * )
     *
     * @var string
     */
    public $image;


    /**
     * @OA\Property(
     *     description="preferred_media_contact",
     *     title="preferred_media_contact",

     * )
     *
     * @var MediaModel
     */
    public $preferred_media_contact;


}

