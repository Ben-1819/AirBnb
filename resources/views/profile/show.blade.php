<x-air-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __("Profile")}}
        </h2>
    </x-slot>

    <div class="py-12">
        <p>{{$user->first_name}}</p>
    </div>
</x-air-layout>
