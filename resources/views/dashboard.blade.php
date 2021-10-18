<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div x-data="{ showAddNewForm: false }" @form-canceled.window="showAddNewForm = false">
                    <div class="p-6 bg-white border-b border-gray-200 uppercase font-semibold flex justify-between">
                        <div>
                            All Patients
                        </div>
                        <div clas>
                            <button class="bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded" @click="showAddNewForm = true">Add New Patient</button>
                        </div>
                    </div>
                    <div x-show="showAddNewForm">
                        <livewire:add-new-patient-form />
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <livewire:patient-table />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
