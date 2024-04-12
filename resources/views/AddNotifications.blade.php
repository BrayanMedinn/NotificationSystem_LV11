<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
    </x-slot>
   <form method="POST" action="/add-notification">
      @csrf
      <!-- Tipo de mensaje -->
      <div>
        <x-label for="notificacion" :value="__('Nuevo catalogo de notificación')" />
        <x-input id="notificacion" class="block mt-1 w-full" type="text" name="notificacion" required autofocus />
      </div>

      <div class="flex items-center justify-end mt-4">
         <x-button class="ml-3">
            {{ __('Agregar') }}
         </x-button>
      </div>
   </form>
  </x-auth-card>
</x-guest-layout>