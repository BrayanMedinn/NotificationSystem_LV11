<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
    </x-slot>
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
      <a href="/nueva-notificacion">Nueva notificación</a>
      <a href="/nueva-categoria">Agregar categoria</a>
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
  </x-auth-card>
</x-guest-layout>