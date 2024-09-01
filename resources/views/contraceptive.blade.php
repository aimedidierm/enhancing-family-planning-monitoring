@extends('layout')

@section('content')
<x-admin-navbar />
<div class="flex-1 p-10">
    <section class="mb-16">
        <h2 class="text-3xl font-bold mb-6">Manage Contraceptives</h2>
        <button onclick="toggleModal(true)" class="bg-blue-700 text-white py-2 px-6 rounded-lg">Create</button>
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-6 mt-6">
            @if($errors->any())
            <span style="color: red;">{{$errors->first()}}</span>
            <br>
            <br>
            @endif
            @if (session('success'))
            <div id="alert-3"
                class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            @endif
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-blue-700 text-white">Date</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">Patient</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">Method</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">Due Date</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">Reminder Time</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($methods->isEmpty())
                    <tr>
                        <td class="py-2 px-4">No contraceptives</td>
                    </tr>
                    @else
                    @foreach ($methods as $method)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{$method->created_at}}</td>
                        <td class="py-2 px-4">{{$method->patient->name}}</td>
                        <td class="py-2 px-4">{{$method->method}}</td>
                        <td class="py-2 px-4">{{$method->due_date}}</td>
                        <td class="py-2 px-4">{{$method->reminder_date}}</td>
                        <td class="py-2 px-4">
                            <form action="{{ route('admin.contraceptive.destroy', $method->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this method?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-lg">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- Modal -->
<div id="createModal"
    class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full transform scale-95 transition-transform duration-300">
        <h3 class="text-2xl font-semibold mb-4">Create New Contraceptives</h3>
        <form method="POST" action="/admin/contraceptive">
            @csrf
            <div class="mb-4">
                <label for="patient" class="block text-gray-700 font-semibold mb-2">Patient</label>
                <select name="patient" name="patient" id="patient" class="w-full p-3 bg-gray-200 rounded-lg">
                    @foreach ($patients as $patient)
                    <option value="{{$patient->id}}">{{$patient->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="method" class="block text-gray-700 font-semibold mb-2">Contraceptives Method</label>
                <select name="method" name="method" id="method" class="w-full p-3 bg-gray-200 rounded-lg">
                    <option value="OralPills">Oral Pills</option>
                    <option value="Injectables">Injectables</option>
                    <option value="Implants">Implants</option>
                    <option value="IUDs">IUDs</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="due_date" class="block text-gray-700 font-semibold mb-2">Due Date</label>
                <input type="date" name="due" id="due_date" class="w-full p-3 bg-gray-200 rounded-lg">
            </div>
            <div class="mb-4">
                <label for="due_date" class="block text-gray-700 font-semibold mb-2">Reminder Due Date</label>
                <input type="datetime-local" name="reminder_datetime" id="due_datetime"
                    class="w-full p-3 bg-gray-200 rounded-lg">
            </div>
            <button type="submit" class="bg-blue-700 text-white py-2 px-6 rounded-lg">Create</button>
            <button type="button" onclick="toggleModal(false)"
                class="ml-2 bg-red-500 text-white py-2 px-6 rounded-lg">Cancel</button>
        </form>
    </div>
</div>

<script>
    function toggleModal(show) {
        const modal = document.getElementById('createModal');
        if (show) {
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100', 'pointer-events-auto');
            setTimeout(() => {
                modal.querySelector('.transform').classList.remove('scale-95');
                modal.querySelector('.transform').classList.add('scale-100');
            }, 10);
        } else {
            modal.querySelector('.transform').classList.remove('scale-100');
            modal.querySelector('.transform').classList.add('scale-95');
            setTimeout(() => {
                modal.classList.remove('opacity-100', 'pointer-events-auto');
                modal.classList.add('opacity-0', 'pointer-events-none');
            }, 300);
        }
    }
</script>
@stop