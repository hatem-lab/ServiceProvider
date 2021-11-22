<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangeAdminPhoneRequest;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\ChangePhoneRequest;
use App\Http\Requests\Auth\ForgetPasswordConfirmRequest;
use App\Http\Requests\Auth\LoginAdminRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\ProfileRequest;
use App\Http\Requests\Auth\RegisterAdminRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ResendCodeAdminRequest;
use App\Http\Requests\Auth\VerifyAccountRequest;
use App\Http\Requests\Auth\VerifyAdminAccountRequest;
use App\Models\Admin;
use App\Models\API\auth\ForgetPasswordConfirm;
use App\Models\API\auth\RegisterResult;
use App\Models\API\auth_admin\ProfileAdminResult;
use App\services\FillApiModelService;
use App\services\AdminService;
use App\services\UserService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthAdminController extends Controller
{
    /**
     * Class AuthController
     */


    /**
     * @OA\Post(path="/agent/register",
     *     tags={"Auth-Agent_register"},
     *     summary="Register as a new agent",
     *     operationId="authRegister",
     *     @OA\Parameter(
     *         name="Language",
     *         in="header",
     *         description="(en or ar) If left empty it is English",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         description="Registration model",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegisterAdminModel")
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "RegisterResult response",
     *         @OA\JsonContent(ref="#/components/schemas/ApiResultRegisterResult"),
     *     ),
     * )
     * @param RegisterAdminRequest $request
     * @return string
     */

    public function register(RegisterAdminRequest $request)
    {
        list($res, $data, $msg , $ex) = AdminService::apiProfileCreate($request);

        if($res){
            return response()->json($data);
        } else {
            return returnError($msg , $ex);
        }
    }


    /**
     * @OA\Post(path="/user/register-user",
     *     tags={"Auth-client_register"},
     *     summary="Register as a new user",
     *     operationId="authRegister",
     *     @OA\Parameter(
     *         name="Language",
     *         in="header",
     *         description="(en or ar) If left empty it is English",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         description="Registration model",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegisterModel")
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "RegisterResult response",
     *         @OA\JsonContent(ref="#/components/schemas/ApiResultRegisterResult"),
     *     ),
     * )
     * @param RegisterRequest $request
     * @return string
     */

    public function register_user(RegisterRequest $request)
    {

        list($res, $data, $msg , $ex) = UserService::apiProfileCreate($request);

        if($res){
            return response()->json($data);
        } else {
            return returnError($msg , $ex);
        }
    }

    /**
     * @OA\Post(path="/user/login",
     *     tags={"Auth-login"},
     *     summary="Login as a Agent and User",
     *     operationId="authLogin",
     *     @OA\Parameter(
     *         name="Language",
     *         in="header",
     *         description="(en or ar) If left empty it is English",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         description="Login model",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LoginAdminPayload")
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "User Profile response",
     *         @OA\JsonContent(ref="#/components/schemas/LoginAdminResultApi"),
     *     ),
     * )
     * @param LoginAdminRequest $request
     * @return JsonResponse
     */

    public function login(Request $request)
    {
        if($user=User::where('phone',$request->phone)->first())
        {
            if(! Hash::check($request->password, $user->password))
            {
                $message='this password not found';
                $message = is_array($message) ? implode($message) : $message;
                return returnError($message ,'');
            }
        }
        list($res, $data, $msg, $ex) = AdminService::loginPhoneEmailValidation($request);

        if ($res) {
            return response()->json($data);
        } else {
            return returnError($msg, $ex);
        }
    }
    /**
     * @OA\Post(path="/user/verify-account",
     *     tags={"Auth-login"},
     *     summary="Verify account with changing its status to active",
     *     @OA\Parameter(
     *         name="Language",
     *         in="header",
     *         description="(en or ar) If left empty it is English",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         description="ConfirmAccountModel model",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ConfirmAccountModel")
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "User Profile response",
     *         @OA\JsonContent(ref="#/components/schemas/LoginResultApi"),
     *     ),
     * )
     * @param VerifyAdminAccountRequest $request
     * @return JsonResponse
     */

    public function verify_account(VerifyAdminAccountRequest $request)
    {
        list($res, $data, $msg , $ex) = AdminService::confirmAdminPhone($request);

        if($res){
            return response()->json($data);
        } else {
            return returnError($msg , $ex);
        }
    }

    /**
     * @OA\Post(path="/user/change-password",
     *     tags={"Auth-login"},
     *     summary="Change Password For Agent And User",
     *     operationId="authChangePhone",
     *     security={{"apiAuth":{}}},
     *     @OA\Parameter(
     *         name="Language",
     *         in="header",
     *         description="(en or ar) If left empty it is English",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         description="ChangePhoneNumberKernelModel model",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ChangePasswordAgentPayload")
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "Success response",
     *         @OA\JsonContent(ref="#/components/schemas/ApiResult"),
     *     ),
     * )
     * @param ChangePhoneRequest $request
     * @return JsonResponse
     */

    public function change_password(Request $request)
    {
        list($res, $data, $msg , $ex) = AdminService::adminChangePassword($request);

        if($res){
            return response()->json($data);
        } else {
            return returnError($msg , $ex);
        }
    }

    /**
     * @OA\Post(path="/user/forget-password",
     *     tags={"Auth-login"},
     *     summary="Resend the code if not received",
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
     *         name="phone",
     *         description="phone of admin",
     *         in="query",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "Success response",
     *         @OA\JsonContent(ref="#/components/schemas/ApiResult"),
     *     ),
     * )
     * @param ResendCodeAdminRequest $request
     * @return JsonResponse
     */

    public function forget_password(ResendCodeAdminRequest $request)
    {
        return AdminService::AdminForgetPassword($request);
    }

    /**
     * @OA\Post(path="/user/reset-password",
     *     tags={"Auth-login"},
     *     summary="Verify account with changing its status to active",
     *     @OA\Parameter(
     *         name="Language",
     *         in="header",
     *         description="(en or ar) If left empty it is English",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         description="ConfirmAccountModel model",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/ForgetPasswordConfirm")
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "User Profile response",
     *         @OA\JsonContent(ref="#/components/schemas/LoginResultApi"),
     *     ),
     * )
     * @param ForgetPasswordConfirmRequest $request
     * @return JsonResponse
     */

    public function reset_password(ForgetPasswordConfirmRequest $request)
    {
        return AdminService::AdminForgetPasswordConfirm($request);
    }





    /**
     * @OA\Post(path="/user/logout",
     *     tags={"Auth-login"},
     *     summary="Logout from system",
     *     security={{"apiAuth":{}}},
     *     @OA\Parameter(
     *         name="Language",
     *         in="header",
     *         description="(en or ar) If left empty it is English",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "Success response",
     *         @OA\JsonContent(ref="#/components/schemas/ApiResult"),
     *     ),
     * )
     * @param $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        return AdminService::apiLogOut($request);
    }



    /**
     * @OA\Post(path="/user/delete-account",
     *     tags={"Auth-login"},
     *     summary="Delete as a user and agent",
     *     security={{"apiAuth":{}}},
     *     @OA\Parameter(
     *         name="Language",
     *         in="header",
     *         description="(en or ar) If left empty it is English",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         description="LoginPayload model",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LoginPayload")
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "Success response",
     *         @OA\JsonContent(ref="#/components/schemas/ApiResult"),
     *     ),
     * )
     * @param LoginRequest $request
     * @return JsonResponse
     */

    public function delete_account(LoginRequest $request)
    {
        return UserService::deleteAccount($request);
    }

    /**
     * @OA\Get(path="/user/check-token",
     *     tags={"Auth-login"},
     *     summary="Test a token for expiration",
     *     security={{"apiAuth":{}}},
     *     @OA\Parameter(
     *         name="Language",
     *         in="header",
     *         description="(en or ar) If left empty it is English",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description = "Success response",
     *         @OA\JsonContent(ref="#/components/schemas/ApiResult"),
     *     ),
     * )
     */

    public function check_token()
    {
        return UserService::checkToken();
    }






}
