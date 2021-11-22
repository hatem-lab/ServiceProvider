<?php


namespace App\Models\notifications\SaveRequestByAgent;



use App\enums\AdminType;
use App\enums\NotificationType;
use App\Models\Admin;
use App\Models\notifications\Notification;
use App\Models\Order;
use App\Models\PropertyRequest;
use Illuminate\Support\Facades\Lang;
use App\services\FillApiModelService;

class NewSaveRequestNotification extends Notification
{
    /** @var Order */
    protected $model;

    public function getUsersId(): array
    {
       return $query=PropertyRequest::where('user_id',$this->model->user_id)

            ->where('id',$this->model->id)

            ->pluck('user_id')->toArray();
//        //$query=(object)$query;
//       //stopv($query);
//        return PropertyRequest::where('id' , $this->model->user_id)
//            ->select('id');

    }

    public function getAdminsId(): array
    {
        return [];
    }

    public function getDeliveryGuysId()
    {
         return [];

    }


    public function getNotificationType(): int
    {
        return NotificationType::NEW_SAVE;
    }

    public function getTranslatedBody($user): string
    {
        if($user->language==='ar')
        {
            return  Lang::get('all.Office',[],$user->language)." ".Admin()->username." ".Lang::get('all.saved your request',[],$user->language);

        }else{
            return  Lang::get('all.Office',[],$user->language)." ".Admin()->username." ".Lang::get('all.saved your request',[],$user->language);

        }

        //return  Admin()->username;
    }

    public function getCustomData()
    {
        return FillApiModelService::FillPropertyRequestApiModel($this->model);
    }

    public function url(): string
    {
        return '';
        //return \Yii::$app->urlManager->createUrl(['/request/view', 'id' => $this->model->id]);
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
