<?php

/**
 * @license Apache 2.0
 */

namespace App\Models\API\lists;

use App\Models\API\other\IdValueApiModel;
use Illuminate\Database\Eloquent\Model;


/**
 * Class ContactMediaApiModel
 *
 * @package Petstore30
 *
 * @OA\Schema(
 *     title="ContactMediaApiModel model",
 *     description="ContactMediaApiModel model",
 * )
 */
class ContactMediaApiModel extends Model
{

    protected $fillable = [
        'id' , 'name','status'
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
     *     description="Name",
     *     title="name",
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     description="status",
     *     title="status",
     * )
     *
     * @var integer
     */
    public $status;
}

