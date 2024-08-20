@extends('layout')

@section('content')
<x-admin-navbar />
<div class="flex-1 p-10">
    <!-- Dashboard Section -->
    <section id="dashboard" class="mb-16">
        <h2 class="text-3xl font-bold mb-6">Dashboard Overview</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold mb-4">Total Patients</h3>
                <p class="text-2xl font-bold">{{$patients}}</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold mb-4">Active Admins</h3>
                <p class="text-2xl font-bold">{{$admins}}</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold mb-4">New Announcements</h3>
                <p class="text-2xl font-bold">{{$announcements}}</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold mb-4">Oral Pills</h3>
                <p class="text-2xl font-bold">{{$oralPills}}</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold mb-4">Injectables</h3>
                <p class="text-2xl font-bold">{{$Injectables}}</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold mb-4">Implants</h3>
                <p class="text-2xl font-bold">{{$Implants}}</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold mb-4">IUDs</h3>
                <p class="text-2xl font-bold">{{$IUDs}}</p>
            </div>
        </div>
    </section>
</div>
@stop