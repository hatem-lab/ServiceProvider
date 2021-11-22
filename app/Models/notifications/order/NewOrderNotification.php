<?php


namespace App\Models\notifications\order;



use App\enums\AdminType;
use App\enums\NotificationType;
use App\Models\Admin;
use App\Models\notifications\Notification;
use App\Models\Order;
use App\services\FillApiModelService;

class NewOrderNotification extends Notification
{
    /** @var Order */
    protected $model;

    public function getUsersId(): array
    {
        return [];
    }

    public function getAdminsId(): array
    {
        return [];
    }

    public function getDeliveryGuysId()
    {
         $query1 = Admin::with('region')
                    ->get()
                    ->where('region.city.id' , $this->model->regionTo->city->id);

        $query2 = Admin::with('region')
            ->get()
            ->where('region.city.id' , $this->model->regionFrom->city->id);

        return $query1->merge($query2)
            ->where('type' , AdminType::delivery_guy)
            ->where('car_type_id' , $this->model->car_type_id)
            ->map(function ($user) {
                return collect($user->toArray())
                    ->only('id')
                    ->all();
            });

    }


    public function getNotificationType(): int
    {
        return NotificationType::NEW_ORDER;
    }

    public function getTranslatedBody($user): string
    {
        return trans( "User added a new order");
    }

    public function getCustomData()
    {
        return FillApiModelService::FillOrderApiModel($this->model);
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
