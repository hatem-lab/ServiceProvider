<?php


namespace App\Models\notifications\offer;



use App\enums\AdminType;
use App\enums\NotificationType;
use App\Models\Admin;
use App\Models\notifications\Notification;
use App\Models\Offer;
use App\Models\Order;
use App\services\FillApiModelService;
use App\User;

class DeleteOfferNotification extends Notification
{
    /** @var Offer */
    protected $model;

    public function getUsersId()
    {
        return User::where('id' , $this->model->order->user_id)
            ->select('id');
    }

    public function getAdminsId()
    {
        return [];
    }

    public function getDeliveryGuysId()
    {
         return [];
    }


    public function getNotificationType(): int
    {
        return NotificationType::DELETE_OFFER;
    }

    public function getTranslatedBody($user): string
    {
        return trans( "User removed the offer because " . $this->model->delete_resion);
    }

    public function getCustomData()
    {
        return FillApiModelService::FillOfferApiModel($this->model);
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
