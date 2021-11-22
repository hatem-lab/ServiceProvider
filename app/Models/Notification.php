<?php

namespace App\Models;

use App\enums\NotificationType;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table="notifications";
    protected $guarded=[];
    public function getData()
    {
        switch ($this->type) {
            case NotificationType::NEW_ORDER:
                return Order::find($this->data_id);
                break;

            case NotificationType::NEW_OFFER:
                return Offer::find($this->data_id);
                break;
        }
        return null;
    }

    public function getImageUrl()
    {
        $model = $this->getData();

        if (!$model) {
            return null;
        }
        switch ($this->type) {
            case NotificationType::NEW_ORDER:
                return null;
                break;

            case NotificationType::NEW_OFFER:
                return null;
                break;
        }
    }

    public function getUser()
    {
        return $this->hasOne('App\User', 'user_id');
    }

    public function getAdmin()
    {
        return $this->hasOne('App\Models\Admin', 'admin_id');
    }
}
