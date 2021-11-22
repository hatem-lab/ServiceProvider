<?php


namespace App\Models\notifications;



use App\Models\Admin;
use App\User;

interface INotification
{

    /**
     * INotification constructor.
     * @param null $model
     */
    public function __construct($model = Null);

    /**
     * @param Notification $notification
     * @return bool
     */
    public static function send(Notification $notification) : bool;

    /**
     * return the id the data that wll be attached to the notification
     * @return string
     */
    public function getDataId();

    /**
     * notification title
     * @param User $user
     * @return string
     */
    public function getTitle($user): string;

    /**
     * notification body
     * @param User $user
     * @return string
     */
    public function getTranslatedBody($user): string;

    /**
     * firebase data with custom data
     * @return array
     */
    public function getData(): array;

    /**
     * transfer the model object
     * @return mixed
     */
    public function getCustomData();

    /**
     * the type of notification from NotificationType Enum
     * @return int
     */
    public function getNotificationType(): int;

    /**
     * array for global user id
     * @return array
     */
    public function getUsersId();

    /**
     * array for admin id
     * @return array
     */
    public function getAdminsId();



    /**
     * array of global users who will receive the notification
     * @return User[]
     */
    public function getUsers();

    /**
     * array of global users who will receive the notification
     * @return Admin[]
     */
    public function getAdmins();

    /**
     * array of global users who will receive the notification
     * @return Admin[]
     */
    public function getDeliveryGuys();

    public function toFireBase($user): void;

    public function toDatabase($user): void;

    public function toDatabaseAdmin($user): void;

    /**
     * notification URL
     * @return string
     */
    public function url(): string;

    public function image(): string;
}
