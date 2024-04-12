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
}
