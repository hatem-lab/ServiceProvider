<?php


namespace App\Models\notifications\CodeConfirmation;



use App\enums\AdminType;
use App\enums\NotificationType;
use App\Models\Admin;
use App\Models\City;
use App\Models\notifications\Notification;
use App\Models\Order;
use App\Models\Region;
use App\Models\UserMobileEmail;
use App\User;
use Illuminate\Support\Facades\Lang;
use App\Models\PropertyRequest;
use App\services\FillApiModelService;


class sendCodePhone extends Notification
{
    /** @var UserMobileEmail */
    protected $model;

    public function getUsersId(): array
    {
         return [];


    }

    public function getAdminsId(): array
    {
   return [];
    }

    public function getGuyId()
    {
        $model_user=UserMobileEmail::where('id',$this->model->id)->first();
        return $query=User::where('id',$model_user->id)->pluck('id')->toArray();

    }


    public function getNotificationType(): int
    {
        return NotificationType::NEW_REQUEST;
    }

    public function getTranslatedBody($user): string
    {

       // return  Lang::get('all.User added a new request',[],$user->language);

    }

    public function getCustomData()
    {
        return FillApiModelService::FillPropertyRequestApiModel($this->model);
    }

    public function url(): string
    {
        return '';

    }

    public function image(): string
    {
        return '';
    }

    public function getDataId()
    {
        return $this->model->id;
    }
}
