<?php


namespace App\Models\notifications;




use App\enums\Constents;
use App\enums\NotificationType;
use App\Models\Admin;
use App\services\AdminService;
use App\User;

abstract class Notification implements INotification
{


    public $saveToDataBase = true;
    public $sendToFirebase = true;

    /** @var BaseObject $model */
    protected $model;

    public function __construct($model = Null)
    {
        $this->model = $model;
    }

    public static function send(Notification $notification) : bool
    {
        $curlHandler = curl_init();
        $headers = [
            'Content-Type: application/json',
        ];
        $data = '?type=' . $notification->getNotificationType() . '&dataId=' . ($notification->model ? $notification->model->id : null);


       // /** @var User $user */
        foreach ($notification->getUsers() as $user) {
            if($notification->saveToDataBase && $user->enable_notification=== 1){
                $notification->toDatabase($user);
            }

            if ($notification->sendToFirebase && $user->firebase_token && $user->enable_notification=== 1) {
                $notification->toFireBase($user);
            }
        }






        /** @var Admin $user */
        foreach ($notification->getAdmins() as $user) {
            if($notification->saveToDataBase && $user->enable_notification=== 1){
                $notification->toDatabaseAdmin($user);
            }
            if ($notification->sendToFirebase && $user->firebase_token && $user->enable_notification=== 1) {
                $notification->toFireBase($user);
            }
        }


        return true;
    }

    public function toFireBase($user): void
    {
        $from = "AAAA0APA-qk:APA91bE9IiNT0wx_F2WOYLhBG388llxL_6LkrWteD3DtDQf4d9lHfAUKiGPrylADr8B-ND-bqmRa1n4vXMfY-xmLSqI4Reggx6T2s1aTp0p8gwSwhjyoFnCONJUJLrbC9-2NyYe7A5aB";
        $msg = array
        (
            'body'  => $this->getTranslatedBody($user),
            'title' => $this->getTitle($user),
            'receiver' => 'Diyaa',
            'icon'  => "https://image.flaticon.com/icons/png/512/270/270014.png",/*Default Icon*/
            'sound' => 'mySound'/*Default sound*/
        );

        $fields = array
        (
            'to'        => $user->firebase_token,
            'notification'  => $msg
        );

        $headers = array
        (
            'Authorization: key=' . $from,
            'Content-Type: application/json'
        );
        //#Send Response To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
       // dd($result);
        curl_close( $ch );
    }

    public function getTitle($user): string
    {

        return NotificationType::Labels($user->language)[$this->getNotificationType()];


    }

    public function getData(): array
    {
        return [
            (object)[
                'key' => 'type',
                'value' => $this->getNotificationType()
            ],
            (object)[
                'key' => 'data',
                'value' => $this->getCustomData()
            ],
            (object)[
                "key" => "click_action",
                "value" => "FLUTTER_NOTIFICATION_CLICK"
            ]
        ];
    }

    public function getUsers()
    {
        return User::whereIn('id',$this->getUsersId())
            ->get();
    }

    public function getAdmins()
    {
        return Admin::whereIn('id',$this->getAdminsId())
            ->get();
    }

    public function getDeliveryGuys()
    {
        return Admin::whereIn('id',$this->getDeliveryGuysId())
            ->get();
    }


    public function toDatabase($user): void
    {
        $notification = new \App\Models\Notification();

        $notification->user_id = $user->id;

        $notification->title = $this->getTitle($user);
        $notification->content = $this->getTranslatedBody($user);
        $notification->data_id = $this->model ? $this->model->id : null;
        $notification->type = $this->getNotificationType();

        $notification->date = date(Constents::full_date_format);
        $notification->url = $this->url();
        $notification->image = $this->image();
        $notification->is_read = 0;
        $notification->publish = 0;
        $notification->save();
    }

    public function toDatabaseAdmin($user): void
    {
        $notification = new \App\Models\Notification();

        $notification->admin_id = $user->id;

        $notification->title = $this->getTitle($user);
        $notification->content = $this->getTranslatedBody($user);
        $notification->data_id = $this->model ? $this->model->id : null;
        $notification->type = $this->getNotificationType();

        $notification->date = date(Constents::full_date_format);
        $notification->url = $this->url();
        $notification->image = $this->image();
        $notification->is_read = 0;
        $notification->publish = 0;
        $notification->save();
    }

}
