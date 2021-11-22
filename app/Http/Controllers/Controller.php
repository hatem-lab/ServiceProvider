<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *    title="Service Provider",
 *    version="1.0.0",
 * ),
 *   @OA\Server(
 *   url="/public/api",
 *   description="main server",
 * ),
 *   @OA\Server(
 *   url="/backend/public/api",
 *   description="local server",
 * ),
 *
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Authentication Bearer Token",
 *     name="Authentication Bearer Token",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="apiAuth",
 *     )
 */


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
