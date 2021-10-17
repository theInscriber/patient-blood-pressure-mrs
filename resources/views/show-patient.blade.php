<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show Patient
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 uppercase font-semibold">
                    Patient Info
                </div>
                <div class="p-6 bg-white border-b border-gray-200 flex justify-around">
                    <div>
                        <div>First Name</div>
                        <div class="text-2xl">{{$patient->first_name}}</div>
                    </div>
                    <div>
                        <div>Last Name</div>
                        <div class="text-2xl">{{$patient->last_name}}</div>
                    </div>
                    <div>
                        <div>Sex</div>
                        <div class="text-2xl">{{$patient->sex}}</div>
                    </div>
                    <div>
                        <div>Birth Date</div>
                        <div class="text-2xl">{{$patient->birth_date}}</div>
                    </div>
                    <div class="w-2/6">
                        <div>Address</div>
                        <div class="text-xl">{{$patient->address}}</div>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-10">
                <div x-data="{ showAddNewForm: false }" @form-canceled.window="showAddNewForm = false">
                    <div class="p-6 bg-white border-b border-gray-200 uppercase font-semibold flex justify-between">
                        <div>
                            Patient Blood Pressure Readings
                        </div>
                        <div clas>
                            <button class="bg-gray-700 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded" @click="showAddNewForm = true">Add New Reading</button>
                        </div>
                    </div>
                    <div x-show="showAddNewForm">
                        <livewire:add-new-blood-pressure-reading-form :patient-id="$patient->id"/>
                    </div>
                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    <livewire:blood-pressure-reading-table  :patient-id="$patient->id"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
