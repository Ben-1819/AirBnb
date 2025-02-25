<?php
    use App\Models\User;
    use Spatie\Permission\Models\Role;
?>

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __("Profile")}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @haspermission("addProperty")
                <button class="border-2 border-solid border-red-500 hover:bg-black hover:text-white flex flex-1 justify-center float-right">Add new property</button>
                @endhaspermission
                <div class="max-w-xl">
                    <label>First name: {{$user->first_name}}</label>

                    <br>
                    <label>Last Name: {{$user->last_name}}</label>
                    <br>
                    <label>Date of Birth: {{$user->DOB}}</label>
                    <br>
                    <label>Email address: {{$user->email}}</label>
                    <br>
                    <?php
                        $user = request()->user();
                    ?>
                    @if($user->hasRole("host"))
                        <label>Account type: Host</label>
                    @else
                        <label>Account type: Customer</label>
                    @endif
                </div>
                @hasrole("host")
                <button class="border-2 border-solid border-red-500 hover:bg-black hover:text-white flex flex-1 justify-center float-right">View your properties</button>
                @endhasrole
                <form action="{{route("profile.edit")}}" method="get">
                    @csrf
                    <button class="border-2 border-solid border-red-500 hover:bg-black hover:text-white flex flex-1 justify-center float-left">Edit Profile</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
