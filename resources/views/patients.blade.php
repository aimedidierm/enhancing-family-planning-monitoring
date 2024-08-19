@extends('layout')

@section('content')
<x-admin-navbar />
<div class="flex-1 p-10">
    <section class="mb-16">
        <h2 class="text-3xl font-bold mb-6">Manage Patients</h2>
        <button onclick="toggleModal(true, 'createModal')"
            class="bg-blue-700 text-white py-2 px-6 rounded-lg">Create</button>
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg p-6 mt-6">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-blue-700 text-white">Name</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">Sex</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">Phone</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">DOB</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">Address</th>
                        <th class="py-2 px-4 bg-blue-700 text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-4">John Doe</td>
                        <td class="py-2 px-4">Male</td>
                        <td class="py-2 px-4">0788750979</td>
                        <td class="py-2 px-4">01/01/2024</td>
                        <td class="py-2 px-4">Kigali, Rwanda</td>
                        <td class="py-2 px-4">
                            <button class="bg-red-500 text-white py-1 px-3 rounded-lg">Delete</button>
                            <button onclick="toggleModal(true, 'updateModal')"
                                class="bg-green-500 text-white py-1 px-3 rounded-lg">Update</button>
                        </td>
                    </tr>
                    <!-- More rows here -->
                </tbody>
            </table>
        </div>
    </section>
</div>

<!-- Create Patient Modal -->
<div id="createModal"
    class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300">
    <div
        class="bg-white p-8 rounded-lg shadow-lg max-w-2xl w-full transform scale-95 transition-transform duration-300">
        <h3 class="text-2xl font-semibold mb-4">Create New Patient</h3>
        <form>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input type="text" id="name" class="w-full p-3 bg-gray-200 rounded-lg" placeholder="Patient Name">
                </div>
                <div>
                    <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                    <input type="number" id="phone" class="w-full p-3 bg-gray-200 rounded-lg"
                        placeholder="Patient Phone Number">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="dob" class="block text-gray-700 font-semibold mb-2">Date of Birth</label>
                    <input type="date" id="dob" class="w-full p-3 bg-gray-200 rounded-lg">
                </div>
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" class="w-full p-3 bg-gray-200 rounded-lg"
                        placeholder="Patient Email">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="sex" class="block text-gray-700 font-semibold mb-2">Sex</label>
                    <select name="sex" id="sex" class="w-full p-3 bg-gray-200 rounded-lg">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div>
                    <label for="address" class="block text-gray-700 font-semibold mb-2">Address</label>
                    <input type="text" id="address" class="w-full p-3 bg-gray-200 rounded-lg"
                        placeholder="Patient Address">
                </div>
            </div>
            <button type="submit" class="bg-blue-700 text-white py-2 px-6 rounded-lg">Create</button>
            <button type="button" onclick="toggleModal(false, 'createModal')"
                class="ml-2 bg-red-500 text-white py-2 px-6 rounded-lg">Cancel</button>
        </form>
    </div>
</div>

<!-- Update Patient Modal -->
<div id="updateModal"
    class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-opacity duration-300">
    <div
        class="bg-white p-8 rounded-lg shadow-lg max-w-2xl w-full transform scale-95 transition-transform duration-300">
        <h3 class="text-2xl font-semibold mb-4">Update Patient</h3>
        <form>
            <!-- Reuse the same form structure as in the Create modal -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="name-update" class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input type="text" id="name-update" class="w-full p-3 bg-gray-200 rounded-lg"
                        placeholder="Patient Name">
                </div>
                <div>
                    <label for="phone-update" class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                    <input type="number" id="phone-update" class="w-full p-3 bg-gray-200 rounded-lg"
                        placeholder="Patient Phone Number">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="dob-update" class="block text-gray-700 font-semibold mb-2">Date of Birth</label>
                    <input type="date" id="dob-update" class="w-full p-3 bg-gray-200 rounded-lg">
                </div>
                <div>
                    <label for="email-update" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email-update" class="w-full p-3 bg-gray-200 rounded-lg"
                        placeholder="Patient Email">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="sex-update" class="block text-gray-700 font-semibold mb-2">Sex</label>
                    <select name="sex-update" id="sex-update" class="w-full p-3 bg-gray-200 rounded-lg">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div>
                    <label for="address-update" class="block text-gray-700 font-semibold mb-2">Address</label>
                    <input type="text" id="address-update" class="w-full p-3 bg-gray-200 rounded-lg"
                        placeholder="Patient Address">
                </div>
            </div>
            <button type="submit" class="bg-green-500 text-white py-2 px-6 rounded-lg">Update</button>
            <button type="button" onclick="toggleModal(false, 'updateModal')"
                class="ml-2 bg-red-500 text-white py-2 px-6 rounded-lg">Cancel</button>
        </form>
    </div>
</div>

<script>
    function toggleModal(show, modalId) {
        const modal = document.getElementById(modalId);
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