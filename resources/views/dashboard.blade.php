<style>
    .card-section {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.card {
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
    .card {
        width: calc(50% - 20px);
    }
}

@media screen and (max-width: 480px) {
    .card {
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

    <div class="card-section">
        @foreach($category as $c)
        <div class="card">
            <h2>{{ $c->name }}</h2>
            <form action="#" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <button type="submit" class="subscribe-button">Suscribirse</button>
            </form>
        </div>
        @endforeach
    </div>

    <!-- <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 flex flex-row justify-between">
            <div class="relative" style="cursor:pointer">
                <p class="absolute p-6">Deportes</p>
                <img class="categoria-subscripcion" width="350" height="240" src="https://www.iberdrola.com/documents/20125/40948/mujer-deporte-alianza-exito-746x419.png/77d9c70c-fdd8-e9ad-0538-ad88a314ac0f?t=1701793959991" alt="deportes.jpg">
                <form action="#" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <button type="submit" class="btn btn-primary">Suscribirse</button>
                </form>
            </div>
            <div class="relative" style="cursor:pointer">
                <p class="absolute p-6">Finanzas</p>
                <img width="350" height="240" src="https://www.montepiedad.com.mx/storage/2022/04/consejos_para_cuidar_tu_salud_financiera.jpg" alt="finanzas.png">
            </div>
            <div class="relative" style="cursor:pointer;">
                <p class="absolute p-6">Peliculas</p>
                <img width="350" height="240" src="https://static.vecteezy.com/system/resources/previews/005/648/406/original/watching-movie-in-3d-glasses-flat-illustration-friends-students-enjoy-film-on-tv-set-with-popcorn-and-drinks-isolated-together-cartoon-characters-with-outline-elements-on-white-background-vector.jpg" alt="movie.jpg">
            </div>
        </div>
    </section> -->
</x-app-layout>
