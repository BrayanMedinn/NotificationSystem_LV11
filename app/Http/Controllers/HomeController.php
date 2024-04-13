<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Notification;
use App\Models\Category;

class HomeController extends Controller
{
    public function Types() {
            $category = Category::get_categories_subscription();
            $notification = Notification::get_notifications_types();
            $notifications_history = Notification::get_notifications();
            return view('index', [
                'category' => $category,
                'notification' => $notification,
                'history' => $notifications_history
            ]);
        }
}
