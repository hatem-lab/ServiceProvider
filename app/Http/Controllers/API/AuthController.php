<?php

namespace App\Http\Controllers\API;

use App\enums\UserConfirmationType;
use App\enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActivateRequest;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\ChangePhoneRequest;
use App\Http\Requests\Auth\ForgetPasswordConfirmRequest;
use App\Http\Requests\Auth\LocationRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\ResendCodeAdminRequest;
use App\Http\Requests\Auth\VerifyAccountRequest;
use App\Models\API\auth\RegisterResult;
use App\Models\UserMobileEmail;
use App\services\FillApiModelService;
use App\services\UserService;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\API\auth\LoginPayload;
use Illuminate\Support\Facades\Hash;


/**
 * Class AuthController
 */

class AuthController extends Controller
{

















}

