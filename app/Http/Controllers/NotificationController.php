<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NotificationController extends Controller
{
    public function send (Request $request) {
        // Validamos los campos del formulario
        $request->validate([
            'notificacion' => 'string',
            'categoria' => 'string',
            'mensaje' => 'required|string',
        ]);


        // dd($request->all());

    }

    public function add(Request $request) {
        $request->validate([
            'notificacion' => 'required|string',
        ]);

        DB::table('notification_types')->insert([
                'name' => $request->notificacion]);

        return redirect('/');
    }

    public function delete() {
        // Función pata eliminar categorias
    }
}
