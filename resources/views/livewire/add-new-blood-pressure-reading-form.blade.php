<div class="flex flex-col items-center">
    <div class="w-6/12">
        <form method="POST" wire:submit.prevent="submit">
            @csrf
            <div class="flex justify-between">
                <div class="m-5">
                    <label for="systolic" class="block">Systolic</label>
                    <input id="systolic" wire:model="systolic" class="block w-full rounded" type="number" value="{{old('systolic')}}" required/>
                    @error('systolic')
                    <div class="text-red-600">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="m-5">
                    <label for="diastolic" class="block">Diastolic</label>
                    <input id="diastolic" wire:model="diastolic" class="block w-full rounded" type="number" value="{{old('diastolic')}}" required/>
                    @error('diastolic')
                    <div class="text-red-600">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="m-5">
                <label for="observation-datetime" class="block">Observation Datetime</label>
                <input id="observation-datetime" wire:model="observationDatetime" class="block w-full rounded" type="datetime-local"/>
                @error('observationDatetime')
                <div class="text-red-600">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="m-5">
                <label for="observation-note" class="block">Observation Note</label>
                <textarea id="observation-note" wire:model="observationNote" class="block w-full rounded">

                </textarea>
                @error('observationNote')
                <div class="text-red-600">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="m-5 flex justify-end">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mx-2" type="submit">Save</button>
                <button class="bg-gray-200 hover:bg-gray-300 text-gray-900 font-bold py-2 px-4 rounded" wire:click="cancelForm" type="button">Cancel</button>
            </div>
            <div wire:loading wire:target="submit">
                Creating ... <br> You will be redirected to the Login Page when all is done.
            </div>
        </form>
    </div>
</div>
