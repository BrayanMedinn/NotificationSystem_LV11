<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Notification extends Model
{
    use HasFactory;

    public static function get_notifications_types () {
        return DB::table('notification_types as types')
        ->select('name', 'id')
        ->get();
    }

    public static function get_notifications () {
        return DB::table('notifications')
        ->join('categories_subscription', 'notifications.subscription_category_id', '=', 'categories_subscription.id')
        ->select(
            'notifications.id','notifications.subscription_category_id','notifications.notification_type_id',
            'notifications.message', 'notifications.created_at', 'categories_subscription.name as categoryName')
        ->orderBy('notifications.created_at', 'desc')
        ->get();
    }

    public static function categoryByName () {
        return DB::table('notifications')
        ->join('categories_subscription', 'notifications.subscription_category_id', '=', 'categories_subscription.id')
        ->select('categories_subscription.id', 'categories_subscription.name as categoryName')
        ->get();
    }
}
