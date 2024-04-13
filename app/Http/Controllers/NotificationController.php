<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;

class NotificationController extends Controller
{
    public function send (Request $request) {
        // Validamos los campos del formulario
        $request->validate([
            'notificacion' => 'numeric',
            'categoria' => 'numeric',
            'mensaje' => 'required|string',
        ]);

        $date = Carbon::now()->format('Y-m-d H:i:s');

        // dd($request->all());

        DB::table('notifications')->insert([
          'subscription_category_id' => $request->categoria,
          'notification_type_id' => $request->notificacion,
          'message' => $request->mensaje,
          'created_at' => $date
        ]);

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
