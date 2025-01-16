<x-guest-layout>
    <form method="POST" action="{{ route('profile.editpost',$user->id) }}">
        @csrf
        <!-- Nombre -->
        <div>
            <x-input-label for="Nombre" :value="__('Nombre')" />
            <x-text-input id="Nombre" class="block mt-1 w-full" type="text" name="Nombre" value="{{ $user->Nombre }}" required autofocus autocomplete="Nombre" />
            <x-input-error :messages="$errors->get('Nombre')" class="mt-2" />
        </div>

        <!-- Apellido -->
        <div>
            <x-input-label for="Apellido" :value="__('Apellido')" />
            <x-text-input id="Apellido" class="block mt-1 w-full" type="text" name="Apellido" value="{{ $user->Apellido }}" required autofocus autocomplete="Apellido" />
            <x-input-error :messages="$errors->get('Apellido')" class="mt-2" />
        </div>

        <!-- Numero de Telefono -->
            <div>
            <x-input-label for="Nrodetelefono" :value="__('Numero de Telefono')" />
            <x-text-input id="Nrodetelefono" class="block mt-1 w-full" type="text" name="Nrodetelefono" value="{{ $user->Nrodetelefono }}" required autofocus autocomplete="Nrodetelefono" />
            <x-input-error :messages="$errors->get('Nrodetelefono')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="Correo" :value="__('Correo Electronico')" />
            <x-text-input id="Correo" class="block mt-1 w-full" type="email" name="Correo" value="{{ $user->Correo }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('Correo')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('Actualizar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
