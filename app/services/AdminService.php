<?php

namespace App\services;

use App\enums\ErrorCode;
use App\enums\LoginApiEnum;
use App\enums\UserConfirmationType;
use App\enums\UserStatus;
use App\Models\Admin;
use App\Models\AdminMobileEmail;
use App\Models\API\auth\LoginResult;
use App\Models\API\auth\LoginResultApi;
use App\Models\API\auth_admin\LoginAdminResult;
use App\Models\API\auth_admin\LoginAdminResultApi;
use App\Models\API\other\ApiMessage;
use App\Models\API\other\ApiResult;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\Region;
use App\Models\ServiceProviderProfile;
use App\Models\UserMobileEmail;
use App\User;
use common\enums\ActiveInactiveStatus;
use common\enums\Constents;
use common\enums\NotificationType;
use common\enums\UserTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;
use Tymon\JWTAuth\Facades\JWTAuth;


class AdminService {

    const Msg_RegistrationSuccess = "Please Enter the Confirmation Code you will receive via SMS to confirm your moile number.";
    const Msg_Exception = "Something is wrong !!";



    public static function adminProfileUpdate($request) {
        try {
            $model = admin();
            if(isset($request->region_id)){
                $region = Region::find($request->region_id);
                if(!$region) return returnError("This region id is not valid");
            }
            if(isset($request->car_type_id)){
                $region = CarType::find($request->car_type_id);
                if(!$region) return returnError("This car type id is not valid");
            }
            if ($model) {
                $model->fname = (isset($request->first_name) && $request->first_name) ?
                    $request->first_name :
                    $model->fname;

                $model->lname = (isset($request->last_name) && $request->last_name) ?
                    $request->last_name :
                    $model->lname;

                $model->isOnline = (isset($request->isOnline)) ? $request->isOnline : $model->isOnline;
                $model->region_id = (isset($request->region_id)) ? $request->region_id : $model->region_id;
                $model->car_type_id = (isset($request->car_type_id)) ? $request->car_type_id : $model->car_type_id;
                $model->lat = (isset($request->lat)) ? $request->lat : $model->lat;
                $model->lng = (isset($request->lng)) ? $request->lng : $model->lng;


                if ($request->image) {
                    $model->avatar = uploadImage($request->image, Admin::image_directory);
                }

                return (!$model->save()) ?
                    returnError("Error saving admin") :
                    returnSuccess("Admin has been updated");

            } else return returnError("Admin not found");

        }catch (\Exception $ex){
            return returnError(AdminService::Msg_Exception , $ex->getMessage() , $ex->getCode());
        }
    }


    public static function addAdminMobileEmail($admin_id,$phone, $is_primary = 0) {
        try {
            $model = new AdminMobileEmail([
                'confirm_code' => rand(10000, 99999),
                'is_confirmed' => 0,
                'is_primary' => $is_primary,
                'type' => UserConfirmationType::account_confirm,
                'admin_id' => $admin_id,
                'mobile' => $phone,
            ]);

            $model->save();
            //Notification::send(new sendCodePhone($model));
            //$model->sendConfirmationCodePhone(UserConfirmationType::account_confirm);
            return [true, ''];

        } catch (\Exception $ex) {
            return [false, $ex->getMessage()];
        }

    }

    public static function adminChangePassword($request)
    {

        $model = user();
        try {

            $model->password =Hash::make ($request->newPassword);

            if(!$model->save()) {
                return [false , null , "Error saving new password" , ''];
            }

            $data=api_error_msg('Password is changed',ErrorCode::success,'Success','');

            return [true , $data , '' , ''];

        }catch (\Exception $ex){
            return [false , null , AdminService::Msg_Exception , $ex->getMessage()];
        }


    }


    public static function loginPhoneEmailValidation($request) {

        try {
            $login_model = new LoginResult();


            $token = Auth::guard('user-api')->attempt(['phone' => $request->phone, 'password' => $request->password]);
            $user = Auth::guard('user-api')->user();


            if (!$user) {
                $login_model->resultCode = LoginApiEnum::not_found;
                $login_model->resultText = LoginApiEnum::LabelOf($login_model->resultCode);
            } elseif ($user->status == UserStatus::STATUS_BANNED) {
                $login_model->resultCode = LoginApiEnum::banned;
                $login_model->resultText = LoginApiEnum::LabelOf($login_model->resultCode);
            } elseif (!$user->mobile_confirmed) {
                $login_model->resultCode = LoginApiEnum::not_confirmed;
                $login_model->resultText = LoginApiEnum::LabelOf($login_model->resultCode);
            } elseif ($user->status == UserStatus::STATUS_INACTIVE) {
                $login_model->resultCode = LoginApiEnum::not_active;
                $login_model->resultText = LoginApiEnum::LabelOf($login_model->resultCode);
            } else {
                $login_model->resultCode = LoginApiEnum::accepted;
                $login_model->resultText = LoginApiEnum::LabelOf($login_model->resultCode);
                $login_model->token = $token;
                //$login_model->profile = FillApiModelService::FillProfileResultModel($user);
            }

            $result = new LoginResultApi([
                'result' => $login_model,
                'isOk' => true,
                'message' => new ApiMessage([
                    'type' => 'Success',
                    'code' => ErrorCode::success,
                    'content' => '',
                ])
            ]);

            return [true, $result, '', ''];

        } catch (\Exception $ex) {
            return [false, null, AdminService::Msg_Exception, $ex->getMessage()];
        }

    }

    public static function checkToken() {
        if (!\admin()) {
            return returnError(trans('Token expired'));
        }

        return returnSuccess(trans('Token Valid'));
    }

    public static function adminChangePhone($request) {
        $model = admin();
        try {
            $userMobile = AdminMobileEmail::where(['admin_id' => $model->id])
                                        ->where(['type' => UserConfirmationType::account_confirm])
                                        ->first();
            if(!$userMobile){
                $userMobile = new AdminMobileEmail([
                    'admin_id' => $model->id,
                    'type' => UserConfirmationType::account_confirm,
                    'is_primary' => 0,
                ]);
            }

            $userMobile->mobile = $request->newPhoneNumber;
            $userMobile->is_confirmed = 0;
            $userMobile->confirm_code = rand(10000, 99999);
            if(!$userMobile->save()) {
                return [false , null , "Error saving phone" , ''];
            }

            $model->status = UserStatus::STATUS_INACTIVE;
            $model->mobile_confirmed = 0;
            $model->phone = $request->newPhoneNumber;
            $model->save();
            $data = new ApiResult([
                'isOk' => true,
                'message' => new ApiMessage([
                    'type' => 'Success',
                    'code' => ErrorCode::success,
                    'content' => trans('Phone number is changed'),
                ]),
            ]);
            return [true , $data , '' , ''];

        }catch (\Exception $ex){
            return [false , null , AdminService::Msg_Exception , $ex->getMessage()];
        }
    }


    public static function apiLogOut(Request $request) {
        try{
            $token = Str::after($request->header('Authorization') , 'Bearer ');
            JWTAuth::setToken($token)->invalidate();
            return returnSuccess("Logged out successfully");
        }catch (\Exception $ex){
            return returnError(AdminService::Msg_Exception , $ex->getMessage());
        }
    }

    public static function confirmAdminPhone($request, $type = UserConfirmationType::account_confirm) {

        try {
            $model = UserMobileEmail::where(['mobile' => $request->phone])
                ->where(['type' => $type])
                ->first();

            if ($model->is_confirmed) {
                return [false, null, "Mobile already confirmed" , ''];
            }
            if ($model->confirm_code != $request->code) {
                return [false, null, "Wrong confirmation code" , ''];
            } else {
                $user = User::where('id', $model->user_id)->first();

                if (!$user) {
                    return [false, null, "Admin not found" , ''];
                }
                $model->is_confirmed = 1;
                if (!$model->save()) {
                    return [false, null, "Error saving email" , ''];
                }
                $user->mobile_confirmed = 1;
                $user->status = UserStatus::STATUS_ACTIVE;
                if (!$user->save()) {
                    return [false, null, "Error saving user" , ''];
                }

                //delete other phones
                $models = UserMobileEmail::where(['user_id' => $model->user_id])
                    ->where('mobile', 'not' , $request->phone)
                    ->where(['type' => $type])
                    ->get();

                foreach ($models as $one) {
                    $one->delete();
                }

                $login_model = new LoginAdminResult();
                $login_model->resultCode = LoginApiEnum::accepted;
                $login_model->resultText = LoginApiEnum::LabelOf($login_model->resultCode);
                //$login_model->profile = FillApiModelService::FillProfileAdminResultModel($user);
                $res = new LoginAdminResultApi([
                    'result' => $login_model,
                    'isOk' => true,
                    'message' => new ApiMessage([
                        'type' => 'Success',
                        'code' => ErrorCode::success,
                        'content' => 'this user has been confirmed',
                    ])
                ]);
            }
            return [true , $res , '' , ''];
        }catch (\Exception $ex){
            return [false , null , AdminService::Msg_Exception ,$ex->getMessage()];
        }
    }


    public static function resendCode($request) {

        try {
            $model = AdminMobileEmail::where(['mobile' => $request->phone])
                ->where(['type' => UserConfirmationType::account_confirm])
                ->where(['is_confirmed' => 0])
                ->first();

            if ($model) {
                $model->confirm_code = rand(10000, 99999);
                if (!$model->save()) {
                    return returnError("Error saving code");

                }
            } else {
                return returnError("User is already activated");
            }

            return returnSuccess('Code Resent');
        }catch (\Exception $ex){
            return returnError(AdminService::Msg_Exception , $ex->getMessage());
        }
    }



    public static function AdminForgetPassword($request) {

        try {
            $admin = User::where(['phone' => $request->phone])->first();


            if (!$admin) {
                return returnError("Admin not found");
            }

            $model = UserMobileEmail::where(['mobile' => $request->phone])
                ->where(['type' => UserConfirmationType::forgot_password])
                ->where(['is_confirmed' => 0])
                ->first();


            if (!$model) {
                $model = new UserMobileEmail([
                    'confirm_code' => rand(10000, 99999),
                    'is_confirmed' => 0,
                    'is_primary' => 0,
                    'admin_id' => $admin->id,
                    'mobile' => $request->phone,
                    'type' => UserConfirmationType::forgot_password
                ]);
                $model->save();
            }

            //send code
            $msg = UserService::Msg_RegistrationSuccessForgetPasswordPhone;
            $model->sendConfirmationCodePhone(UserConfirmationType::forgot_password);

            return returnSuccess($msg);
        }catch (\Exception $ex){
            return returnError(AdminService::Msg_Exception , $ex->getMessage());
        }
    }

    public static function AdminForgetPasswordConfirm($request) {

        try {
            $admin = User::where(['phone' => $request->phone])
                ->where(['status' => UserStatus::STATUS_ACTIVE])
                ->first();

            if (!$admin) {
                return returnError("User not found");
            }

            $model = UserMobileEmail::where(['mobile' => $request->phone])
                ->where(['type' => UserConfirmationType::forgot_password])
                ->where(['is_confirmed' => 0])
                ->first();

            if (!$model) {
                return returnError("Forget password request not found!");
            }

            if ($model->confirm_code != $request->code) {
                return returnError("Wrong confirmation code");

            } else {
                $model->is_confirmed = 1;
                if (!$model->save()) {
                    return returnError("Error saving phone");
                }

                //change password
                $admin->password = bcrypt($request->newPassword);
                if (!$admin->save()) {
                    return returnError("Error saving phone");
                }
            }
            return returnSuccess('Password is Changed');
        }catch (\Exception $ex){
            return returnError(AdminService::Msg_Exception , $ex->getMessage() , $ex->getCode());
        }
    }




}
