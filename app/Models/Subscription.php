<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Subscription extends Model
{
    use HasFactory;

    public static function getSubscriptionCategory($id_user) {
        return DB::table('user_subscription_categories')
        ->select('user_id', 'subscription_category_id')
        ->where('user_id', $id_user)
        ->get();
    }

    public static function subscriptionDate($id_user) {
        return DB::table('user_subscription_categories')
        ->select('subscription_category_id', 'created_at')
        ->where('user_id', $id_user)
        ->get();
    }


    public static function getNotificationsByUser($id_user) {
        return DB::table('notifications')
        ->join('user_subscription_categories', 'notifications.subscription_category_id', '=', 'user_subscription_categories.subscription_category_id')
        ->select('notifications.id', 'notifications.message',
         'notifications.subscription_category_id', 'notifications.notification_type_id', 'notifications.created_at')
        ->where('user_subscription_categories.user_id', $id_user)
        ->get();
    }

}
