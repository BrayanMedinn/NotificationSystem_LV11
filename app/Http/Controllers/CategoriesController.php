<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoriesController extends Controller
{
    public function add(Request $request) {
        $request->validate([
            'categoria' => 'required|string',
        ]);

        $save = DB::table('categories_subscription')->insert([
                'name' => $request->categoria]);

        return redirect('/');
    }

    public function delete() {
        // Función pata eliminar categorias
    }
}
