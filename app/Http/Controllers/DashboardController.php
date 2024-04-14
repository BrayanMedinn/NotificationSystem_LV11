<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Notification;
use App\Models\Category;
use App\Models\Subscription;

class DashboardController extends Controller
{
    public static function dashboard_data() {
        $user_id = Auth::id();
        $category = Category::get_categories_subscription();
        $notification = Notification::get_notifications_types();
        // obtenemos suscripciones del usuario
        $subscriptions = Subscription::getSubscriptionCategory($user_id);
        $notificatonsByUser = Subscription::getNotificationsByUser($user_id);
        $totalNotification = count($notificatonsByUser);

        // Obtenemos el nombre de la categoria y del tipo de notificación
        $category_name = Notification::categoryByName(); 
        $notification_name = Notification::get_notifications_types();


        return view('dashboard', [
            'category' => $category,
            'notification' => $notification,
            'subscriptions' => $subscriptions,
            'userNotifications' => $notificatonsByUser,
            'totalNotification' => $totalNotification,
            'categoryName' => $category_name,
            'notificationName' => $notification_name
        ]);
    }
}
