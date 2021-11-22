<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\lists;


use Illuminate\Database\Eloquent\Model;

/**
 * Class MediaModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="MediaAdminModel model",
 *     description="MediaAdminModel model",
 * )
 */

class MediaAdminModel extends Model
{

    protected $fillable = [
       'id',  'name' , 'status'
    ];




    /**
     * @OA\Property(
     *     description="preferred_contact_media name",
     *     title="name",
     * )
     *
     * @var string
     */
    public $name;




}

