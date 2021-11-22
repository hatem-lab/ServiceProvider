<?php

namespace App\services;


use App\enums\ActiveInactiveStatus;
use App\enums\Constents;
use App\enums\ErrorCode;
use App\enums\NotificationType;
use App\enums\OfferStatus;
use App\enums\RequestStatus;
use App\enums\UserStatus;
use App\Models\Admin;
use App\Models\API\app_info\AboutApp;
use App\Models\API\app_info\ContactUs;
use App\Models\API\auth\ApiResultProfileResult;
use App\Models\API\auth\ApiResultRegisterResult;
use App\Models\API\auth\ProfileResult;
use App\Models\API\auth\RegisterResult;
use App\Models\API\auth_admin\ApiResultProfileAdminResult;
use App\Models\API\auth_admin\CarDetails;
use App\Models\API\auth_admin\ProfileAdminResult;
use App\Models\API\lists\ContactMediaApiModel;
use App\Models\API\lists\JobTypeModel;
use App\Models\API\lists\OrderStatusListModel;
use App\Models\API\lists\OrderStatusListResult;
use App\Models\API\lists\SectionModel;
use App\Models\API\location\City;
use App\Models\API\location\CityApiModel;
use App\Models\API\location\Country;
use App\Models\API\location\LocationApiModel;
use App\Models\API\location\RegionApiModel;
use App\Models\API\notification\ListNotifications;
use App\Models\API\orders\Offer;
use App\Models\API\orders\Order;
use App\Models\API\orders\OrderOffer;
use App\Models\API\other\ApiMessage;
use App\Models\API\other\IdValueApiModel;
use App\Models\API\reports\ReportReasonApiModel;
use App\Models\API\reviews\ReviewApiModel;
use App\Models\API\reviews\ReviewUserApiModel;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\Location;
use App\Models\Region;
use App\Models\Review;
use App\Models\Section;
use App\User;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Object_;
use stdClass;


class FillApiModelService
{
    public static function FillContactMediaApiModel($item){
        $model = new ContactMediaApiModel([
            'id' => $item->id,
            'name' => $item->name,
            'status'=>getActive($item->status)
        ]);
        return $model;
    }


    public static function FillListJobTypeApiModel($item){

        $model = new JobTypeModel([
            'id' => $item->id,
            'type' => $item->name,
            'status' => getActive($item->status),

        ]);
        return $model;
    }

    public static function FillListSectionApiModel($item){

        $model = new SectionModel([
            'id' => $item->id,
            'name' => $item->name,
            'status' => getActive($item->status),

        ]);
        return $model;
    }


    public static function FillProfileResultModel($item , $isOrder = false)
    {
        return new ProfileResult([
            'id' => $item->id,
            'first_name' => $item->fname,
            'last_name' => $item->lname,
            'phone' => $item->phone,
            'image' => $item->avatar ? getImage($item->avatar ) : '',
            'NumberOfDeliveryOperation' => $isOrder ? null : $item->orders->where('status' , RequestStatus::delivered)->count(),
            'locations' => $isOrder ? null : self::FillLocationApiModel($item->id)
        ]);

    }

    public static function FillProfileAdminResultModel($item)
    {
        return new ProfileAdminResult([
            'id' => $item->id,
            'first_name' => $item->fname,
            'last_name' => $item->lname,
            'phone' => $item->phone,
            'image' => $item->avatar ? getImage($item->avatar ) : '',
            'NumberOfDeliveryOperation' => \App\Models\Offer::with('order')
                                        ->get()
                                        ->where('admin_id' , $item->id)
                                        ->where('order.status' , RequestStatus::delivered)
                                        ->count(),

            'car_details' => self::FillCarDetails($item),
            'location' => self::FillLocationAdmin($item),
            'isOnline' =>  isset($item->isOnline)
                ? self::FillIdValueApiModel($item->isOnline, ($item->isOnline == 1) ? 'Yes' : 'No')
                : $item->isOnline,
            'rate_count' => Review::where('entity' , 'admin')
                                ->where('entity_id' , $item->id)
                                ->count(),

            'rate' => (double) (Review::where('entity' , 'admin')
                                    ->where('entity_id' , $item->id)
                                    ->avg('rate'))
        ]);
    }

    public static function FillCarDetails($item)
    {
        return new CarDetails([
            'carImages' => self::FillCarImagesApiModel($item->id),
            'carType' => isset($item->car_type)
                ? self::FillIdValueApiModel($item->car_type->id, $item->car_type->car_type)
                : $item->car_type,
        ]);

    }


    public static function FillLocationApiModel($user_id)
    {
        $items = Location::where(['user_id' => $user_id])->get();

        $models = [];
        foreach ($items as $one){
            $models[] = self::FillOneLocation($one);
        }
        return $models;
    }

    public static function FillLocationAdmin($one)
    {
        return new \App\Models\API\location\LocationAdmin([
            'address' => $one->address,
            'country' => ($one->region) ? self::FillCountryApiModel($one->region) : null,
            'lat' => $one->lat,
            'lng' => $one->lng,
        ]);
    }


    public static function FillOneLocation($one)
    {
        return new \App\Models\API\location\Location([
            'id' => $one->id,
            'address' => $one->address,
            'country' => ($one->region) ? self::FillCountryApiModel($one->region) : null,
            'lat' => $one->lat,
            'lng' => $one->lng,
            'status' => isset($one->status)
                ? self::FillIdValueApiModel($one->status, UserStatus::LabelOf($one->status))
                : $one->status,
        ]);
    }

    public static function FillLocationCountryApiModel($item)
    {

        $cities = [];
        foreach ($item->cities as $one) {
            if ($one->status == ActiveInactiveStatus::active) {
                $cities[] = FillApiModelService::FillLocationCityApiModel($one);
            }
        }

        $model = new LocationApiModel([
            'id' => $item->id,
            'name' => $item->name,
            'cities' => $cities,
        ]);

        return $model;
    }

    public static function FillOrderApiModel($item , $state = 0)
    {
        $obj_from = new stdClass();
        $obj_from->id = $item->from;
        $obj_from->region = Region::find($item->region_id_from);
        $obj_from->address = $item->address_from;
        $obj_from->lat = $item->lat_from;
        $obj_from->lng = $item->lng_from;
        $obj_from->status = UserStatus::STATUS_ACTIVE;

        $obj_to = new stdClass();
        $obj_to->id = $item->to;
        $obj_to->region = Region::find($item->region_id_to);
        $obj_to->address = $item->address_to;
        $obj_to->lat = $item->lat_to;
        $obj_to->lng = $item->lng_to;
        $obj_to->status = UserStatus::STATUS_ACTIVE;

        $user = User::find($item->user_id);

        if($state == 1) $offer = self::FillOfferApiModel($item->offers);
        else if($state == 2) $offer = self::FillOfferApiModel($item , 1);
        else if($state == 3)$offer = self::FillOfferApiModel($item , 2);
        else $offer = [];

        return new Order([
            'id' => $item->id,
            'user_profile' => self::FillProfileResultModel($user , true),
            'from' => self::FillOneLocation($obj_from),
            'to' => self::FillOneLocation($obj_to),
            'dateTime' => $item->dateTime,
            'price' => $item->price,
            'description' => $item->description,
            'isWantRide' => isset($item->isWantRide)
                ? self::FillIdValueApiModel($item->isWantRide, ($item->isWantRide == 0 ? 'No' : 'Yes'))
                : $item->isWantRide,
            'car_type' => isset($item->car_type_id)
                ? self::FillCarTypeApiModel(CarType::find($item->car_type_id))
                : $item->car_type_id,
            'status' => isset($item->status)
                ? self::FillIdValueApiModel($item->status, RequestStatus::LabelOf($item->status))
                : $item->status,
            'offers' => $offer,
            'min_offer_price' => ($item->offers->count() > 0) ? (int)$item->offers->min('price') : 0,
            'max_offer_price' => ($item->offers->count() > 0) ? (int)$item->offers->max('price') : 0,
            'is_paid' => isset($item->isPaid)
                ? self::FillIdValueApiModel($item->isPaid, ($item->isPaid == 0 ? 'No' : 'Yes'))
                : $item->isPaid,
        ]);

    }

    public static function FillOfferApiModel($items , $isOne = 0)
    {
        $offers = [];

        if($isOne == 1) {
            $items = $items->offers
                ->where('admin_id', admin()->id)
                ->where('status', OfferStatus::accepted);
        }

        if($isOne == 2) {
            $items = $items->offers
                ->where('admin_id', admin()->id);
        }

        foreach ($items as $offer) {
            $admin = Admin::find($offer->admin_id);
            $offers[] =  new Offer([
                'id' => $offer->id,
                'dg_profile' => self::FillProfileAdminResultModel($admin),
                'price' => $offer->price,
                'description' => $offer->description,
                'create_date' => $offer->created_at,
                'ET' => $offer->ُET,
                'status' => isset($offer->status)
                    ? self::FillIdValueApiModel($offer->status, OfferStatus::LabelOf($offer->status))
                    : $offer->status,
            ]);
        }

        return $offers;
    }

    public static function FillOrderOfferApiModel($items)
    {
        $offers = [];
        foreach ($items as $offer) {
            $admin = Admin::find($offer->admin_id);
            $offers[] =  new OrderOffer([
                'id' => $offer->id,
                'dg_profile' => self::FillProfileAdminResultModel($admin),
                'price' => $offer->price,
                'description' => $offer->description,
                'create_date' => $offer->created_at,
                'ET' => $offer->ُET,
                'status' => isset($offer->status)
                    ? self::FillIdValueApiModel($offer->status, OfferStatus::LabelOf($offer->status))
                    : $offer->status,
                'order' => self::FillOrderApiModel($offer->order),
            ]);
        }

        return $offers;
    }

    public static function FillCarImagesApiModel($admin_id)
    {
        $items = CarImage::where(['admin_id' => $admin_id])->get();

        $models = [];
        foreach ($items as $one){
            $models[] = new \App\Models\API\auth_admin\CarImage([
                'id' => $one->id,
                'image' => $one->image ? getImage($one->image) : '',
            ]);
        }
        return $models;
    }

    public static function FillApiResultRegisterResultModel($item, $msg )
    {
        return new ApiResultRegisterResult([
            'result' => new RegisterResult([
                'message' => __($msg),
            ]),
            'isOk' => true,
            'message' => null,
        ]);
    }

    public static function FillApiResultProfileResult($item)
    {

        $model = new ApiResultProfileResult([
            'result' => $item,
            'isOk' => true,
            'message' => new ApiMessage([
                'type' => 'Success',
                'code' => ErrorCode::success,
                'content' => '',
            ])
        ]);;

        return $model;
    }

    public static function FillApiResultProfileAdminResult($item)
    {

        $model = new ApiResultProfileAdminResult([
            'result' => $item,
            'isOk' => true,
            'message' => new ApiMessage([
                'type' => 'Success',
                'code' => ErrorCode::success,
                'content' => '',
            ])
        ]);;

        return $model;
    }


    public static function FillImagesApiModel($item)
    {
        $model = new ImagesApiModel([
            'id' => $item->id,
            'url' => $item->imageUrl,
        ]);

        return $model;
    }


    public static function FillContactUsApiModel($item)
    {
        $model = new ContactUs([
            'location' => self::FillLocationAdmin($item),
            'phone' => $item->phone,
            'mobile' => $item->mobile,
        ]);

        return $model;
    }

    public static function FillAboutAppApiModel($item)
    {
        $model = new AboutApp([
            'description' => $item->description
        ]);

        return $model;
    }


    public static function FillLocationCityApiModel($item)
    {

        $regions = [];
        foreach ($item->regions as $one) {
            if ($one->status == ActiveInactiveStatus::active) {
                $regions[] = FillApiModelService::FillLocationRegionApiModel($one);
            }
        }

        $model = new CityApiModel([
            'id' => $item->id,
            'name' => $item->name,
            'regions' => $regions,
        ]);

        return $model;
    }

    public static function FillCityApiModel($item)
    {
        $region = [];
        if ($item->status == ActiveInactiveStatus::active)
            $region[] = FillApiModelService::FillLocationRegionApiModel($item);


        $model = new CityApiModel([
            'id' => $item->city->id,
            'name' => $item->city->name,
            'regions' => $region,
        ]);

        return $model;
    }

    public static function FillCountryApiModel($item)
    {
        $city = [];
        if ($item->city->status == ActiveInactiveStatus::active)
            $city[] = FillApiModelService::FillCityApiModel($item);



        $model = new LocationApiModel([
            'id' => $item->city->country->id,
            'name' => $item->city->country->name,
            'cities' => $city,
        ]);

        return $model;
    }


    public static function FillLocationRegionApiModel($item)
    {

        $model = new RegionApiModel([
            'id' => $item->id,
            'name' => $item->name,
        ]);

        return $model;
    }

    public static function FillImages($items)
    {
        $data = [];
        foreach ($items as $one){
            $data[] = new ImageApiModel([
                'id' => $one->id,
                'image' => $one->imageUrl,
            ]);
        }

        return $data;
    }

    public static function FillIdValueApiModel($id, $value)
    {
        $model = new IdValueApiModel([
            'id' => $id,
            'value' => $value ? $value : '',
        ]);

        return $model;
    }

    public static function FillCarTypeApiModel($item)
    {
        return new JobTypeModel([
            'id' => $item->id,
            'car_type' => $item->car_type,
            'icon' => $item->icon ? getImage($item->icon) : '',
        ]);
    }

    public static function FillOrderStatusApiModel($id , $status)
    {
        return new OrderStatusListModel([
            'id' => $id,
            'status' => $status,
        ]);
    }

    public static function FillReviewApiModel($item)
    {

        $model = new ReviewApiModel([
            'id' => $item->id,
            'rate' => $item->rate,
            'content' => $item->content,
            'create_date' => date(Constents::date_format_view_3, strtotime($item->create_date)),
            'user' => self::FillReviewUserApiModel($item->user),
        ]);

        return $model;
    }

    public static function FillReviewUserApiModel($item)
    {

        $model = new ReviewUserApiModel([
            'id' => $item->id,
            'first_name' => $item->fname,
            'last_name' => $item->lname,
            'image' => $item->avatar ? getImage($item->avatar) : '',
        ]);

        return $model;
    }

    public static function FillReportReasonApiModel($item)
    {
        $model = new ReportReasonApiModel([
            'id' => $item->id,
            'title' => $item->title,
            'name' => $item->name,
        ]);

        return $model;
    }

    public static function FillListNotificationsApiModel($item)
    {
        $data = null;
        switch ($item->type) {
            case NotificationType::NEW_ORDER:
                $model = Order::find($item->data_id);

                if (!$model) {
                    return false;
                }
                $notify = new NewBidNotification($model);
                $data = $notify->getCustomData();
                break;

            case NotificationType::NEW_OFFER:
                $model = Offer::find($item->data_id);

                if (!$model) {
                    return false;
                }
                $notify = new NewRequestNotification($model);
                $data = $notify->getCustomData();
                break;
        }

        return new ListNotifications([
            'id' => $item->id,
            'image' => $item->imageUrl,
            'title' => $item->title,
            'body' => $item->content,
            'data' => $data,
            'is_read' => $item->is_read ? true : false,
            'date' => $item->date,
            'type' => $item->type,
        ]);
    }

    public static function FillRequestDetailsApiModel($item)
    {
        $model = new RequestDetailsApiModel([
            'id' => $item->id,
            'request_type' => self::FillIdValueApiModel($item->request_type, RequestType::LabelOf($item->request_type)),
            'bundle' => $item->bundle ? self::FillBundleApiModel($item->bundle) : $item->bundle,
            'status' => self::FillIdValueApiModel($item->status, RequestStatus::LabelOf($item->status)),
            'create_date' => date(Constents::date_format_view_3, strtotime($item->create_date)),
            'types' => self::FillRequestAttachemnts($item->requestTypes),
            'files' => self::FillRequestAttachemnts($item->requestFiles),
        ]);
        return $model;
    }

}
