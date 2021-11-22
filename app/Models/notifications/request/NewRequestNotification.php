<?php


namespace App\Models\notifications\request;



use App\enums\AdminType;
use App\enums\NotificationType;
use App\Models\Admin;
use App\Models\City;
use App\Models\notifications\Notification;
use App\Models\Order;
use App\Models\Region;
use Illuminate\Support\Facades\Lang;
use App\Models\PropertyRequest;
use App\services\FillApiModelService;

class NewRequestNotification extends Notification
{
    /** @var PropertyRequest */
    protected $model;

    public function getUsersId(): array
    {
        return [];
    }

    public function getAdminsId(): array
    {
        if($this->model->city_id!==null)
        {

//            return     $query1 = Admin::with('region')
//                ->get()
//                ->where('region.city.id' , $this->model->regions->city->id)->pluck('id')->toArray();
            return     $query1 = Admin::with('region')->get()
                ->where('region.city.id' , $this->model->city_id)->pluck('id')->toArray();

        }
        else{

            return
                $query1 = Admin::get()
                ->pluck('id')->toArray();

        }



    }

    public function getDeliveryGuysId()
    {
        return [];


    }


    public function getNotificationType(): int
    {
        return NotificationType::NEW_REQUEST;
    }

    public function getTranslatedBody($user): string
    {
          $region=Region::find($this->model->region_id);
        $city=City::find($this->model->city_id);
     if($this->model->region_id !== null)
             {

                 $region=Region::find($this->model->region_id);
                 $region=$region->name;
             }else
             {

                 $region='';
             }
             if($this->model->city_id !== null)
             {

                 $city=City::find($this->model->city_id);
                 $city=$city->name;
             }else
             {

                 $city='';
             }
           if($this->model->sell_rent==='1')
           {
             if($this->model->region_id == null)
             {
                 return  Lang::get('all.Request has been ordered for selling',[],$user->language);
             }else
             {
                 return Lang::get('all.Request has been ordered for selling in region',[],$user->language)." ".$region." ".Lang::get('all.in city',[],$user->language)." ".$city;
             }

           }

           else
           {
                 if($this->model->region_id == null)
             {
                 return  Lang::get('all.Request has been ordered for purchase',[],$user->language);
             }else
             {
                 return Lang::get('all.Request has been ordered for purchase in region',[],$user->language)." ".$region." ".Lang::get('all.in city',[],$user->language)." ".$city;
             }


           }

        //return  $region->id;
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
