<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
    </x-slot>
      <div id="topButton" style="position: fixed; top: 20px; right: 20px;">
         <a href="/login" style="background-color: #333; color: #fff; padding: 10px; border-radius: 5px; text-decoration: none; box-shadow: 0 2px 4px rgba(0,0,0,0.2);">
            Log in
         </a>
      </div>
   <form method="POST" action="/send-notification">
      @csrf
      <!-- Tipo de mensaje -->
      <div>
         <x-label for="notification" :value="__('Tipo de notificación')" />
         <select id="notification" name="notificacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
          @foreach($notification as $notificacion) 
          <option value="{{$notificacion->id}}">{{$notificacion->name}}</option>
          @endforeach
        </select>
      </div>

      
      <!-- Categorias -->
      <div>
         <x-label for="categoria" :value="__('Categoria')" />
         <select id="categoria" name="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
         @foreach($category as $categoria) 
          <option value="{{$categoria->id}}">{{$categoria->name}}</option>
          @endforeach
        </select>
      </div>
      <!-- Nuevas categorias y notificaciones-->
      <div class="p-6 flex justify-between">
      <a class="inline-flex items-center px-2 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" href="/nueva-notificacion">Nueva notificación</a>
      <a class="inline-flex items-center px-2 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" href="/nueva-categoria">Agregar categoria</a>
      </div>
      <!-- Mensaje -->
      <div class="mt-4">
         <x-label for="message" :value="__('Mensaje')" />
         <textarea id="message" name="mensaje" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
         placeholder="Escribe tu mensaje..." required></textarea>
      </div>
      <div class="flex items-center justify-end mt-4">
         <x-button class="ml-3">
            {{ __('Notificar ') }}
         </x-button>
      </div>
   </form>
   <!-- Botón flotante con estilos de CSS puro -->
   <div id="floatingButton" style="position: fixed; bottom: 20px; right: 20px;">
      <a href="#" style="display: inline-block; width: 50px; height: 50px; background-color: white; color: #ffffff; text-align: center; border-radius: 50%; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4); text-decoration: none;">
        <img style="margin:0.45rem" width="36" height="36" src="{{ asset('icons/history.png') }}" alt="history.png">
      </a>
    </div>

    <!-- Centro de notificaciones con animación -->
    <div id="notificationCenter" style="position: fixed; bottom: 90px; right: 20px; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 5px; padding: 5px; width: 300px; max-height: 400px; overflow-y: auto; display: none; z-index: 999;">
         @foreach($history as $notification_history)
         <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:15px;">
            <div class="card-header">
               <p style="font-size:large; font-weight:bold;">{{ $notification_history->categoryName }}</p>
            </div>
            <div class="card-body">
               {{ $notification_history->message }}
            </div>
            <div class="card-footer">
              <small> {{ $notification_history->created_at }} </small>
            </div>
         </div>
         @endforeach
    </div>
  </x-auth-card>
</x-guest-layout>



<script>
  document.getElementById("floatingButton").addEventListener("click", function() {
    var notificationCenter = document.getElementById("notificationCenter");
    if (notificationCenter.style.display === "none" || notificationCenter.style.display === "") {
      notificationCenter.style.display = "block";
      notificationCenter.style.animation = "fadeInUp 0.5s ease-out";
    } else {
      notificationCenter.style.animation = "fadeOutDown 0.5s ease-out";
      setTimeout(function() {
        notificationCenter.style.display = "none";
      }, 500);
    }
  });
</script>