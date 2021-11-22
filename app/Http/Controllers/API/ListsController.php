<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\services\ListsService;

use Illuminate\Http\Request;
use App\Models\Property;
/**
 * Class ListsController
 */
class ListsController
{

    /**
     * @OA\Get(path="/lists/type-jobs",
     *     tags={"Lists"},
     *     summary="type jobs List",
     *     @OA\Parameter(
     *         name="Language",
     *         in="header",
     *         description="(en or ar) If left empty it is English",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="pagesize",
     *         in="query",
     *         description="number of retuned values",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="page number",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="search by name",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "Success response",
     *         @OA\JsonContent(ref="#/components/schemas/JobTypeResult"),
     *     ),
     * )
     */
    public function type_jobs(Request $request)
    {
        list($res, $data, $msg , $ex) =  ListsService::JobsList($request);
        if($res){
            return response()->json($data);
        } else {
            return returnError($msg , $ex);
        }
    }


    /**
     * @OA\Get(path="/lists/sections",
     *     tags={"Lists"},
     *     summary="sections List",
     *     @OA\Parameter(
     *         name="Language",
     *         in="header",
     *         description="(en or ar) If left empty it is English",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="pagesize",
     *         in="query",
     *         description="number of retuned values",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="page number",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="search by name",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "Success response",
     *         @OA\JsonContent(ref="#/components/schemas/SectionResult"),
     *     ),
     * )
     */
    public function sections(Request $request)
    {
        list($res, $data, $msg , $ex) =  ListsService::SectionsList($request);
        if($res){
            return response()->json($data);
        } else {
            return returnError($msg , $ex);
        }
    }

    /**
     * @OA\Get(path="/lists/contact-medias",
     *     tags={"Lists"},
     *     summary="Contact Media List",
     *     @OA\Parameter(
     *         name="Language",
     *         in="header",
     *         description="(en or ar) If left empty it is English",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="pagesize",
     *         in="query",
     *         description="number of retuned values",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="page number",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="search by name",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "Success response",
     *         @OA\JsonContent(ref="#/components/schemas/ContactMediaResult"),
     *     ),
     * )
     */
    public function contact_medias(Request $request)
    {
        list($res, $data, $msg , $ex) =  ListsService::ContactMediasList($request);
        if($res){
            return response()->json($data);
        } else {
            return returnError($msg , $ex);
        }
    }



}
