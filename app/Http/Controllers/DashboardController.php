<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Notification;
use App\Models\Category;

class DashboardController extends Controller
{
    public static function dashboard_data() {
        $category = Category::get_categories_subscription();
        $notification = Notification::get_notifications_types();
        return view('dashboard', [
            'category' => $category,
            'notification' => $notification
        ]);
    }
}
