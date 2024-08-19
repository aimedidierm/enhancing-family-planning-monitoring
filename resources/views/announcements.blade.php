@extends('layout')

@section('content')
<x-admin-navbar />
<div class="flex-1 p-10">
    <section class="mb-16">
        <h2 class="text-3xl font-bold mb-6">Manage Announcements</h2>
        <button onclick="toggleModal(true)" class="bg-blue-700 text-white py-2 px-6 rounded-lg">Create</button>
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-6 mt-6">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-blue-700 text-white">Title</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">Method</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">Message</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-4">Welcoming</td>
                        <td class="py-2 px-4">All</td>
                        <td class="py-2 px-4">Thank you for choosing contraception! Your decision supports your health
                            and well-being, and we’re here to provide
                            support and answer any questions you may have.</td>
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
        <h3 class="text-2xl font-semibold mb-4">
            <h3 class="text-xl font-semibold mb-4">Create New Announcement</h3>
        </h3>
        <form>
            <div class="mb-4">
                <label for="method" class="block text-gray-700 font-semibold mb-2">Contraceptives Method</label>
                <select name="method" id="method" class="w-full p-3 bg-gray-200 rounded-lg">
                    <option value="All">All</option>
                    <option value="OralPills">Oral Pills</option>
                    <option value="Injectables">Injectables</option>
                    <option value="Implants">Implants</option>
                    <option value="IUDs">IUDs</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" id="title" class="w-full p-3 bg-gray-200 rounded-lg"
                    placeholder="Announcement Title">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-700 font-semibold mb-2">Message</label>
                <textarea id="message" class="w-full p-3 bg-gray-200 rounded-lg" rows="4"
                    placeholder="Announcement Message"></textarea>
            </div>
            <button type="submit" class="bg-blue-700 text-white py-2 px-6 rounded-lg">Submit</button>
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