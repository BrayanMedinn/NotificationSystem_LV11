<style>
    .card-section {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.custom-card {
    width: calc(33.33% - 20px);
    margin-bottom: 20px;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.subscribe-button {
    background-color: #3498db;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

/* Estilos para dispositivos móviles */
@media screen and (max-width: 768px) {
    .custom-card {
        width: calc(50% - 20px);
    }
}

@media screen and (max-width: 480px) {
    .custom-card {
        width: calc(100% - 20px);
    }
}

</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categorias
        </h2>
    </x-slot>

    <div style="padding-top:3rem;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                     Disponibles
                </div>
            </div>
        </div>
    </div>

    <div class="pt-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="card-section">
            @foreach($category as $c)
            <div class="custom-card">
                <h2>{{ $c->name }}</h2>
                <form action="/subscribe" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="category_subscription" value="{{ $c->id }}">
                        @php
                            $isSubscribed = false;
                        @endphp

                        @foreach($subscriptions as $subs)
                            @if($subs->subscription_category_id == $c->id)
                                @php
                                    $isSubscribed = true;
                                    break;
                                @endphp
                            @endif
                        @endforeach
                        
                        @if($isSubscribed)
                            <x-button class="ml-3" disabled>
                                {{ __('Suscrito') }}
                            </x-button> 
                        @else
                            <x-button class="ml-3">
                                {{ __('Suscribirse') }}
                            </x-button>
                        @endif
                </form>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Botón flotante con estilos de CSS puro -->
   <div id="floatingButton" style="position: fixed; bottom: 20px; right: 20px;">
      <a href="#" style="display: inline-block; width: 36px; height: 36px; background-color: white; color: #ffffff; text-align: center; border-radius: 50%; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4); text-decoration: none;">
        <img style="margin:0.45rem" width="24" height="24" src="{{ asset('icons/notification.png') }}" alt="notification.png">
        <span id="notificationCount" style="position: absolute; top: 0; right: 0; background-color: red; color: white; border-radius: 50%; padding: 0.1rem 0.4rem; font-size: 0.75rem;">
        {{$totalNotification}}
        </span>
      </a>
    </div>

    <!-- Centro de notificaciones con animación -->
    <div id="notificationCenter" style="position: fixed; bottom: 90px; right: 20px; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 5px; padding: 5px; width: 300px; max-height: 400px; overflow-y: auto; display: none; z-index: 999;">
        @foreach($userNotifications as $notifications)
         <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:15px;">
            <div class="card-header" style="display: flex;
                justify-content: space-between;
                align-items: baseline;">
               <p style="font-size:large; font-weight:bold;">
                    @foreach($categoryName as $data) 
                       @if($notifications->subscription_category_id == $data->id)
                        {{ $data->categoryName }}
                       @endif
                    @endforeach
                </p>

                <small>
                    @foreach($notificationName as $type) 
                        @if($notifications->notification_type_id ==  $type->id)
                            {{$type->name}}
                        @endif
                    @endforeach
                </small>
            </div>
            <div class="card-body">
            {{ $notifications->message }}
            </div>
            <div class="card-footer">
              <small> {{ $notifications->created_at}} </small>
            </div>
         </div>
         @endforeach
    </div>
</x-app-layout>


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
