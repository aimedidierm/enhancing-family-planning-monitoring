@extends('layout')

@section('content')
<x-admin-navbar />
<div class="flex-1 p-10">
    <section class="mb-16">
        <h2 class="text-3xl font-bold mb-6">Manage Admins</h2>
        <button onclick="toggleModal(true)" class="bg-blue-700 text-white py-2 px-6 rounded-lg">Create</button>
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-6 mt-6">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-blue-700 text-white">ID</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">Name</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">Email</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">John Doe</td>
                        <td class="py-2 px-4">john@example.com</td>
                        <td class="py-2 px-4">
                            <button class="bg-red-500 text-white py-1 px-3 rounded-lg">Delete</button>
                        </td>
                    </tr>
                    <!-- More rows here -->
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- Modal -->
<div id="createModal"
    class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full transform scale-95 transition-transform duration-300">
        <h3 class="text-2xl font-semibold mb-4">Create New Admin</h3>
        <form>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" id="name" class="w-full p-3 bg-gray-200 rounded-lg" placeholder="Admin Name">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" id="email" class="w-full p-3 bg-gray-200 rounded-lg" placeholder="Admin Email">
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