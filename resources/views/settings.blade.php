@extends('layout')

@section('content')
<x-admin-navbar />
<div class="flex-1 p-10">
    <section id="settings" class="mb-16">
        <h2 class="text-3xl font-bold mb-6">Settings</h2>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold mb-4">Account Settings</h3>
            <form>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input type="text" id="name" class="w-full p-3 bg-gray-200 rounded-lg"
                        value="{{Auth::user()->name}}" disabled>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" value="{{Auth::user()->email}}"
                        class="w-full p-3 bg-gray-200 rounded-lg" placeholder="Your Email" disabled>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input type="password" id="password" class="w-full p-3 bg-gray-200 rounded-lg"
                        placeholder="Your Password">
                </div>
                <div class="mb-4">
                    <label for="confirm_password" class="block text-gray-700 font-semibold mb-2">Confirm
                        Password</label>
                    <input type="password" id="password" class="w-full p-3 bg-gray-200 rounded-lg"
                        placeholder="Confirm Your Password">
                </div>
                <button type="submit" class="bg-blue-700 text-white py-2 px-6 rounded-lg">Update</button>
            </form>
        </div>
    </section>
</div>
@stop