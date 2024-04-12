<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    use HasFactory;

    public static function get_categories_subscription () {
        return DB::table('categories_subscription as categories')
        ->select('name','id')
        ->get();
    }
}
