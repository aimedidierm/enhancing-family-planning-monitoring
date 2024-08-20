@extends('layout')

@section('content')
<x-admin-navbar />
<div class="flex-1 p-10">
    <section class="mb-16">
        <h2 class="text-3xl font-bold mb-6">Manage Patients</h2>
        <button onclick="toggleModal(true, 'createModal')"
            class="bg-blue-700 text-white py-2 px-6 rounded-lg">Create</button>

        @if($errors->any())
        <br><br>
        <span style="color: red;">{{$errors->first()}}</span>
        <br>
        <br>
        @endif
        @if (session('success'))
        <br><br>
        <div id="alert-3"
            class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
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
                    @if ($patients->isEmpty())
                    <tr>
                        <td class="py-2 px-4" colspan="6">No patients</td>
                    </tr>
                    @else
                    @foreach ($patients as $patient)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $patient->name }}</td>
                        <td class="py-2 px-4">{{ $patient->sex }}</td>
                        <td class="py-2 px-4">{{ $patient->phone }}</td>
                        <td class="py-2 px-4">{{ $patient->dob }}</td>
                        <td class="py-2 px-4">{{ $patient->address }}</td>
                        <td class="py-2 px-4">
                            <form action="{{ route('admin.patients.destroy', $patient->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this patient?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-lg">Delete</button>
                            </form>
                            <button
                                onclick="openUpdateModal({{ $patient->id }}, '{{ $patient->name }}', '{{ $patient->phone }}', '{{ $patient->email }}','{{ $patient->dob }}', '{{ $patient->address }}', '{{ $patient->sex }}')"
                                class="bg-green-500 text-white py-1 px-3 rounded-lg">Update</button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
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
        <form method="POST" action="/admin/patients">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input type="text" name="name" id="name" class="w-full p-3 bg-gray-200 rounded-lg"
                        placeholder="Patient Name">
                </div>
                <div>
                    <label for="phone" class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                    <input type="number" id="phone" name="phone" class="w-full p-3 bg-gray-200 rounded-lg"
                        placeholder="Patient Phone Number">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="dob" class="block text-gray-700 font-semibold mb-2">Date of Birth</label>
                    <input type="date" name="dob" id="dob" class="w-full p-3 bg-gray-200 rounded-lg">
                </div>
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full p-3 bg-gray-200 rounded-lg"
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
                    <input type="text" id="address" name="address" class="w-full p-3 bg-gray-200 rounded-lg"
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
        <form id="updateForm" method="POST" action="">
            @csrf
            @method('PUT')
            <input type="hidden" id="update-patient-id" name="id">
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="name-update" class="block text-gray-700 font-semibold mb-2">Name</label>
                    <input type="text" id="name-update" name="name" class="w-full p-3 bg-gray-200 rounded-lg"
                        placeholder="Patient Name">
                </div>
                <div>
                    <label for="phone-update" class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                    <input type="text" id="phone-update" name="phone" class="w-full p-3 bg-gray-200 rounded-lg"
                        placeholder="Patient Phone Number">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="dob-update" class="block text-gray-700 font-semibold mb-2">Date of Birth</label>
                    <input type="date" id="dob-update" name="dob" class="w-full p-3 bg-gray-200 rounded-lg">
                </div>
                <div>
                    <label for="email-update" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input type="email" id="email-update" name="email" class="w-full p-3 bg-gray-200 rounded-lg"
                        placeholder="Patient Email">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="sex-update" class="block text-gray-700 font-semibold mb-2">Sex</label>
                    <select name="sex" id="sex-update" class="w-full p-3 bg-gray-200 rounded-lg">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div>
                    <label for="address-update" class="block text-gray-700 font-semibold mb-2">Address</label>
                    <input type="text" id="address-update" name="address" class="w-full p-3 bg-gray-200 rounded-lg"
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

    function openUpdateModal(id, name, phone, email, dob, address, sex) {
        // Set the action URL for the form
        document.getElementById('updateForm').action = `/admin/patients/${id}`;

        // Populate the form fields
        document.getElementById('update-patient-id').value = id;
        document.getElementById('name-update').value = name;
        document.getElementById('phone-update').value = phone;
        document.getElementById('email-update').value = email;
        document.getElementById('dob-update').value = dob;
        document.getElementById('address-update').value = address;
        document.getElementById('sex-update').value = sex;

        // Open the modal
        toggleModal(true, 'updateModal');
    }
</script>
@stop