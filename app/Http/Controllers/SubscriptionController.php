<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Notification;
use App\Models\Category;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function newSubscription (Request $request) {
        
        $request->validate([
            'category_subscription' => 'numeric',
            'user_id' => 'numeric'
        ]);
        $date = Carbon::now()->format('Y-m-d H:i:s');

        DB::table('user_subscription_categories')->insert([
            'subscription_category_id' => $request->category_subscription,
            'user_id' => $request->user_id,
            'created_at' => $date
        ]);

        return redirect('/dashboard');
    }
}
